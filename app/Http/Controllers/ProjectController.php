<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tax;
use App\Models\Layout;
use App\Models\Format;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $layouts = Layout::all();
        $taxes = Tax::all();
        $formats = Format::all();

        return view('pages.projects', compact('layouts','taxes','formats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProjectRequest $request)
    {
        $project = DB::transaction(function () use($request) {

            Project::create([
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
        });
        return redirect()->route('projects.page');
    }

    public function showDetails() {
        $projects = Project::all();

        return view('pages.tables.projects-table', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
