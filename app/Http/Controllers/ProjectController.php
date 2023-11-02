<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\Layout;
use App\Models\Project;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    private static $page_title_singular = 'Project';
    private static $page_title_plural = 'Projecten';

    public function __construct()
    {
        $this->subpages = [
            'Bedrijfsgegevens' => '/',
            'ContactPersonen' => '/',
            'Orders' => '/',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        $subpages = $this->getSubpages() ?? false;

        return view('pages.projects', compact('projects'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => 'Nieuwe ' . self::$page_title_singular,
                'subpages' => $subpages
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $project = Project::create([
                'id' => $request->input('project_code'),
                'format_id' => $request->input('format'),
                'layout_id' => $request->input('layout'),
                'designer_id' => $request->input('designer'),
                'printer_id' => $request->input('printer'),
                'client_id' => $request->input('client'),
                'distribution_id' => $request->input('distribution'),
                'btw_country_id' => $request->input('btw_country'),
                'release_name' => $request->input('release_name'),
                'edition_name' => $request->input('edition_name'),
                'print_edition' => $request->input('print_edition'),
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
                'revenue_goals' => $request->input('revenue_goals'),
                'comments' => $request->input('comments'),
            ]);
            $layoutId = $request->input('layout');
            $layout = Layout::findOrFail($layoutId);
            $project->layout()->associate($layout);
        });

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('pages.projects.edit', compact('project'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => 'Nieuwe ' . self::$page_title_singular,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
