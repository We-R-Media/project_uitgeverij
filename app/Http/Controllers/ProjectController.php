<?php

namespace App\Http\Controllers;

use App\Http\Traits\SearchableModelTrait;
use App\AppHelpers\MoneyHelper;
use App\AppHelpers\DateHelper;
use App\Models\Layout;
use App\Models\Tax;
use App\Models\Project;
use App\Models\ProjectPlanning;
use App\Models\User;
use App\Models\Publisher;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    protected $searchService;

    private static $page_title_section = 'Projecten';

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;

        $this->subpages = [
            'Actueel' => 'projects.index',
            'Inactief' => 'projects.inactive',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $user_id = Auth::user()->id;

        $searchQuery = $request->input('search');

        if(Gate::allows('isSeller')) {

            unset($this->subpages['Inactief']);

            $projects = Project::latest('name')
                ->whereNull('deactivated_at')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    $this->searchService->search($query, $searchQuery, [
                        'name',
                        'title',
                        'edition_name',
                    ]);
                })
                ->where('user_id', $user_id)
                ->paginate(12);
        }
        
        else {
            $projects = Project::latest('name')
                ->whereNull('deactivated_at')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    $this->searchService->search($query, $searchQuery, [
                        'name',
                        'title',
                        'edition_name',
                    ]);
                })
                ->paginate(12);
        }


        return view('pages.projects.index', compact('projects'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    public function inactive() {

        $projects = Project::whereNotNull('deactivated_at')->paginate(12);

        return view('pages.projects.index', compact('projects'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'subpagesData' => $this->getSubpages(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layouts = Layout::all();
        $projects = Project::all();
        $taxes = Tax::all();
        $users = User::where('role', 'seller')->get();

        
        return view('pages.projects.create', compact('layouts', 'taxes','users', 'projects'))->with([
            'pageTitleSection' => self::$page_title_section,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    try {
        DB::transaction(function () use ($request) {


            

            $publisherName = $request->input('release_name');

            $publisher = Publisher::where('name', $publisherName)->firstOrCreate([
                'name' => $publisherName,
            ]);

            $layout_id = $request->input('layout');
            $layout = Layout::findOrFail($layout_id);

            $seller_id = $request->input('seller');
            $seller = User::findOrFail($seller_id);

            $seller->save();


            $tax_id = $request->input('taxes');
            $tax = Tax::findOrFail($tax_id);

            $project = Project::create([
                'name' => $request->input('name'),
                'layout_id' => $layout_id,
                'tax_id' => $tax_id,
                'user_id' => $seller->id,
                'publisher_id' => $publisher->id,
                'designer' => $request->input('designer'),
                'printer' => $request->input('printer'),
                'client' => $request->input('client'),
                'distribution' => $request->input('distribution'),
                'release_name' => $publisherName,
                'edition_name' => $request->input('edition_name'),
                'print_edition' => $request->input('print_edition'),
                'paper_format' => $request->input('paper_format'),
                'pages_redaction' => $request->input('pages_redaction'),
                'pages_adverts' => $request->input('pages_adverts'),
                'pages_total' => $request->input('pages_total'),
                'paper_type_cover' => $request->input('paper_type_cover'),
                'paper_type_interior' => $request->input('paper_type_interior'),
                'color_cover' => $request->input('color_cover'),
                'color_interior' => $request->input('color_interior'),
                'ledger' => $request->input('ledger'),
                'journal' => $request->input('journal'),
                'department' => $request->input('department'),
                'year' => $request->input('year'),
                'revenue_goals' => MoneyHelper::convertToNumeric($request->input('revenue_goals')),
                'comments' => $request->input('comments'),
            ]);


            $project->layout()->associate($layout);
            $project->user()->associate($seller);
            $project->tax()->associate($tax);
            $project->publisher()->associate($publisher);
            $project->save();

        });

        Alert::toast('Het project is succesvol aangemaakt', 'success');

        return redirect()->route('projects.index');

    } catch (\Exception $e) {
        Alert::toast('Er is iets fout gegaan', 'error');
        return redirect()->route('projects.index');
    }
}

    public function duplicate($project_id)
    {
        try {

            
        $originalProject = Project::findOrFail($project_id);

        $newProject = $originalProject->replicate();
        $newProject->save();

        $originalFormats = $originalProject->formats;

        foreach ($originalFormats as $originalFormat) {
            $newFormat = $originalFormat->replicate();
            $newProject->formats()->save($newFormat);
        }

        Alert::toast('Project' . ' ' . $newProject->name . ' ' . 'succesvol overgenomen', 'success');

        return redirect()->route('projects.edit', $project_id);

        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('projects.edit', $project_id);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $project_id)
    {
        $project = Project::with('formats')->findOrFail($project_id);

        $this->subpages = [
            'Projectgegevens' => 'projects.edit',
            'Planning' => 'projects.planning',
            'Formaten' => 'formats.index',
        ];

        if(Gate::allows('isSeller')) {

            unset($this->subpages['Formaten']);
            unset($this->subpages['Planning']);
        }

        $layouts = Layout::all();
        $taxes = Tax::all();

        return view('pages.projects.edit', compact('project', 'layouts','taxes'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $project->title,
                'subpagesData' => $this->getSubpages( $project_id ),
                'layouts' => $layouts,
            ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $project_id)
    {
        try {
            DB::transaction(function () use($request, $project_id) {

                $project = Project::findOrFail($project_id);

                // dd($request->input('revenue_goals'));

                $layout_id = $request->input('layout');
                $layout = Layout::findOrFail($layout_id);

                $tax_id = $request->input('taxes');
                $tax = Tax::findOrFail($tax_id);

                Project::where('id', $project_id)->update([
                    'name' => $request->input('name'),
                    'layout_id' => $layout_id,
                    'tax_id' => $tax_id,
                    'designer' => $request->input('designer'),
                    'printer' => $request->input('printer'),
                    'client' => $request->input('client'),
                    'distribution' => $request->input('distribution'),
                    'release_name' => $request->input('release_name'),
                    'edition_name' => $request->input('edition_name'),
                    'print_edition' => $request->input('print_edition'),
                    'paper_format' => $request->input('format'),
                    'pages_redaction' => $request->input('pages_redaction'),
                    'pages_adverts' => $request->input('pages_adverts'),
                    'pages_total' => $request->input('pages_total'),
                    'paper_type_cover' => $request->input('paper_type_cover'),
                    'paper_type_interior' => $request->input('paper_type_interior'),
                    'color_cover' => $request->input('color_cover'),
                    'color_interior' => $request->input('color_interior'),
                    'ledger' => $request->input('ledger'),
                    'journal' => $request->input('journal'),
                    'department' => $request->input('department'),
                    // 'year' => $request->input('year'),
                    'revenue_goals' => MoneyHelper::convertToNumeric($request->input('revenue_goals')),
                    'comments' => $request->input('comments'),
                    'deactivated_at' => $request->input('active') == 0 ? now() : null,
                ]);
                $project->layout()->associate($layout);
                $project->tax()->associate($tax);
                $project->save();
            });

            Alert::toast('Het project is successvol bijgewerkt', 'success');

            session()->forget('edited_project_name');
            return redirect()->route('projects.index');
        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('projects.index');
        }
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_id)
    {
        $project = Project::findOrFail($project_id);

        if( $project ) {
            $project->delete();

            Alert::toast('Het project is verwijderd.', 'info');
        }

        return redirect()->route('projects.index');
    }


    public function planning(string $project_id)
    {
        $project = Project::findOrFail($project_id);
        $planning = Project::with('planning')->find($project->id);

        $this->subpages = [
            'Projectgegevens' => 'projects.edit',
            'Planning' => 'projects.planning',
            'Formaten' => 'formats.index',
        ];

        return view('pages.projects.planning', compact('project'))->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $project->title,
            'subpagesData' => $this->getSubpages( $project_id ),
        ]);
    }

    public function planning__store(Request $request, string $project_id)
    {
        try 
        {
            DB::transaction(function () use($project_id, $request) {

                $project = Project::findOrFail($project_id);

                $planning = ProjectPlanning::create([
                    'project_id' => $project_id,
                    'sale_start' => $request->input('sale_start') ?? now(),
                    'redaction_date' => $request->input('redaction_date') ?? now(),
                    'adverts_date' => $request->input('adverts_date') ?? now(),
                    'printer_date' => $request->input('printer_date') ?? now(),
                    'distribution_date' => $request->input('distribution_date') ?? now(),
                    'appearance_date' => $request->input('appearance_date') ?? now(),
                    'sale_started' => $request->input('sale_started') ?? now(),
                    'redaction_received' => $request->input('redaction_received') ?? now(),
                    'adverts_received' => $request->input('adverts_received') ?? now(),
                    'printer_received' => $request->input('printer_received') ?? now(),
                ]);

                $planning->project()->associate($project);
                $planning->save();
            });

            Alert::toast('Planning is succesvol aangemaakt', 'success');
            return redirect()->route('projects.planning', $project_id);

        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('projects.planning', $project_id);
        }
    }

    public function planning__update(Request $request, string $project_id)
    {
        try 
        {
            DB::transaction(function () use($request, $project_id) {
                ProjectPlanning::where('project_id', $project_id)->update([
                    'sale_start' =>$request->input('sale_start') ?? now(),
                    'redaction_date' => $request->input('redaction_date') ?? now(),
                    'adverts_date' => $request->input('adverts_date') ?? now(),
                    'printer_date' => $request->input('printer_date') ?? now(),
                    'distribution_date' => $request->input('distribution_date') ?? now(),
                    'appearance_date' => $request->input('appearance_date') ?? now(),
                    'sale_started' => $request->input('sale_started') ?? now(),
                    'redaction_received' => $request->input('redaction_received') ?? now(),
                    'adverts_received' => $request->input('adverts_received') ?? now(),
                    'printer_received' => $request->input('printer_received') ?? now(),
                ]);
            });

            Alert::toast('Planning is succesvol bijgewerkt', 'success');
            return redirect()->route('projects.planning', $project_id);

        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('projects.planning', $project_id);
        }
    }
}
