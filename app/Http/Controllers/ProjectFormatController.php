<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\Project;
use App\AppHelpers\MoneyHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectFormatController extends Controller
{

    private static $page_title_section = 'Projecten';

    public function __construct() {
        $this->subpages = [
            'Projectgegevens' => 'projects.edit',
            'Planning' => 'projects.planning',
            'Formaten' => 'formats.index',
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(string $project_id)
    {

        $project = Project::findOrFail($project_id);
        $formats = Format::where('project_id', $project_id)->with('project')->orderBy('size')->paginate(5);

        return view('pages.formats.index', compact('project', 'formats'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
                'pageTitle' => $project->title,
                'subpagesData' => $this->getSubpages( $project_id ),
            ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $project_id)
    {

        $project = Project::findOrFail($project_id);

        return view('pages.formats.create', compact('project'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $project_id)
    {

        try {
            DB::transaction(function () use($request, $project_id) {
            $project = Project::findOrFail($project_id);

               $format = Format::create([
                    'format_title' => $request->input('format_title'),
                    'size' => $request->input('size'),
                    'measurement' => $request->input('measurement'),
                    'ratio' => $request->input('ratio'),
                    'price' => MoneyHelper::convertToNumeric($request->input('price')),
                ]);

                $format->project()->associate($project);
                $format->save();
            });

            Alert::toast('Het formaat is succesvol aangemaakt', 'success');
            return redirect()->route('formats.index', $project_id);
        }
        catch (\Exception $e) {
            Alert::toast('Er is iets fout gegaan', 'error');
            return redirect()->route('formats.index', $project_id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Format $format)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $format_id)
    {
        $format = Format::findOrFail($format_id);

        return view('pages.formats.edit', compact('format'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $format_id, $project_id)
    {
        try {
            DB::transaction(function () use($request, $format_id, $project_id) {
                Format::where('id', $format_id)->update([
                    'format_title' => $request->input('format_title'),
                    'size' => $request->input('size'),
                    'measurement' => $request->input('measurement'),
                    'ratio' => $request->input('ratio'),
                    'price' => MoneyHelper::convertToNumeric($request->input('price')),

                ]);
            });

            Alert::toast('Formaat is succesvol bijgewerkt', 'success');
            return redirect()->route('formats.index', $project_id);

        } catch (\Exception $e) 
        {
            Alert::toast('Er is iets misgegaan', 'error');
            return redirect()->route('formats.index', $project_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $format_id, string $project_id)
    {
        $format = Format::findOrFail($format_id);

        if($format) {
            $format->delete();

            Alert::toast('Het formaat is verwijderd.', 'info');
        }
        return redirect()->route('formats.index', $project_id);
    }


        /**
     * Restore a trashed format.
     *
     * @param  int  $id  The ID of the trashed format to restore.
     * @return void
     */
    public function restore(string $format_id) {

        try 
        {
            $format = Format::onlyTrashed()->findOrFail($format_id);

            $format->restore();

            Log::info('Formaat succesvol hersteld:' . $format->id);
            Alert::toast('Formaat succesvol hersteld', 'success');


        } catch (ModelNotFoundException $e) {
            Log::error('Formaat niet gevonden: ' . $format_id);
            Alert::toast('Formaat niet gevonden', 'error');
        } catch (QueryException $e) {
            Log::error('Databasefout bij herstellen orderregel: ' . $e->getMessage());
            Alert::toast('Er is een fout opgetreden bij het herstellen van de orderregel', 'error');
        }
    }

    public function duplicate($project_id)
    {
        try {
            $originalProject = Project::with('formats')->findOrFail($project_id);

            $newProject = $originalProject->replicate();
            $newProject->save();

            foreach ($originalProject->formats as $originalFormat) {
                $newFormat = $originalFormat->replicate();
                $newProject->formats()->save($newFormat);
            }

            Alert::toast('Project and formats duplicated successfully', 'success');
            return redirect()->route('projects.index');
        } catch (\Exception $e) {
            Alert::toast('Error duplicating project and formats', 'error');
            return redirect()->route('projects.index');
        }
    }
    
    
}
