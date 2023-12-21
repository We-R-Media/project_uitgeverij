<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    /**
     * Perform a search on the given query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query      The query builder instance.
     * @param string|null                           $searchQuery The search query string.
     * @param array                                $columns     The columns to search in.
     *
     * @return \Illuminate\Database\Eloquent\Builder The modified query builder instance.
     */
    public function search(Builder $query, $searchQuery, $columns)
    {
        if ($searchQuery) {
            $query->where(function ($query) use ($columns, $searchQuery) {
                foreach ($columns as $column) {
                    if (str_contains($column, '.')) {
                        [$relation, $field] = explode('.', $column);
                        $query->orWhereHas($relation, function ($query) use ($field, $searchQuery) {
                            $query->where($field, 'like', '%' . $searchQuery . '%');
                        });
                    } else {
                        $query->orWhere($column, 'like', '%' . $searchQuery . '%');
                    }
                }
            });
        }
    
        return $query;
    }
    
}
