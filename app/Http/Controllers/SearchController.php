<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private static $page_title_section = 'Zoeken';

    private static $searchable_models = [
        'Advertiser',
        'Client',
        'Invoice',
        'Order',
        'Project',
        'Seller',
        'User',
    ];

    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = $this->performSearch( $query );

        return view('search.results', compact('results', 'query'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
            ]);
    }

    protected function performSearch($query)
    {
        $searchResults = collect();

        foreach (self::$searchable_models as $modelName) {
            $modelClass = 'App\\Models\\' . $modelName;

            if (class_exists($modelClass) && method_exists($modelClass, 'search')) {
                $results = $modelClass::search($query)->get();

                $searchResults->push([
                    'model' => $modelName,
                    'results' => $results,
                ]);
            }
        }

        return $searchResults;
    }
}
