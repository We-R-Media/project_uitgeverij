<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Models\Tax;
use App\Models\Project;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        if(Gate::allows('isSeller')) {
            $projects = Project::latest()
                ->whereNull('deactivated_at')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    $this->searchService->search($query, $searchQuery, [
                        'title',
                    ]);
                })
                ->where('user_id', $user_id)
                ->paginate(12);
        }
        else {
            $projects = Project::latest()
                ->whereNull('deactivated_at')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    $this->searchService->search($query, $searchQuery, [
                        'title',
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
        $taxes = Tax::all();
        $users = User::where('role', 'seller')->get();

        return view('pages.projects.create', compact('layouts', 'taxes','users'))->with([
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

                $layout_id = $request->input('layout');
                $layout = Layout::findOrFail($layout_id);

                $seller_id = $request->input('seller');
                $seller = User::findOrFail($seller_id);

                $tax_id = $request->input('taxes');
                $tax = Tax::findOrFail($tax_id);

                $project = Project::create([
                    'name' => $request->input('name'),
                    'layout_id' => $layout_id,
                    'tax_id' => $tax_id,
                    'user_id' => $seller_id,
                    'designer' => $request->input('designer'),
                    'printer' => $request->input('printer'),
                    'client' => $request->input('client'),
                    'distribution' => $request->input('distribution'),
                    'release_name' => $request->input('release_name'),
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
                    // 'year' => $request->input('year'),
                    'revenue_goals' => $request->input('revenue_goals'),
                    'comments' => $request->input('comments'),
                ]);
                $project->layout()->associate($layout);
                $project->save();

                $project->user()->associate($seller);
                $project->save();

                $project->tax()->associate($tax);
                $project->save();
            });

            Alert::toast('Het project is succesvol aangemaakt', 'success');

            return redirect()->route('projects.index');

        } catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('projects.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $project_id)
    {
        $project = Project::findOrFail($project_id);

        $this->subpages = [
            'Projectgegevens' => 'projects.edit',
            'Planning' => 'projects.planning',
            'Formaten' => 'formats.index',
        ];

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


                $layout_id = $request->input('layout');
                $layout = Layout::findOrFail($layout_id);

                $tax_id = $request->input('taxes');
                $tax = Tax::findOrFail($tax_id);

                $project->update([
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
                    'revenue_goals' => $request->input('revenue_goals'),
                    'comments' => $request->input('comments'),
                    'deactivated_at' => $request->input('active') == 0 ? now() : null,
                ]);
                $project->layout()->associate($layout);
                $project->save();

                $project->tax()->associate($tax);
                $project->save();
            });

            Alert::toast('Het project is successvol bijgewerkt', 'success');

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

        $this->subpages = [
            'Projectgegevens' => 'projects.edit',
            'Planning' => 'projects.planning',
            'Formaten' => 'formats.index',
        ];

        return view('pages.projects.planning')->with([
            'pageTitleSection' => self::$page_title_section,
            'pageTitle' => $project->title,
            'subpagesData' => $this->getSubpages( $project_id ),
        ]);
    }
}
