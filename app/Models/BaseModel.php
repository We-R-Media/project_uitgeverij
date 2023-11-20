<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class BaseModel extends Model
{
    protected $titleGenerationAttributes = [
        'name'
    ];

    protected $searchableFields = [
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!property_exists($model, 'titleGenerationAttributes') || $model->titleGenerationAttributes !== false) {
                if ( is_null($model->title) && empty($model->title) ) {
                    $title = '';

                    foreach ($model->titleGenerationAttributes as $field) {
                        $value = $model->$field;

                        if (!empty($value)) {
                            $title .= $value . ' ';
                        }
                    }

                    $title = rtrim($title);
                    $model->title = $title;
                }
            }
        });
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    #[SearchUsingPrefix(['title'])]
    #[SearchUsingFullText(['title'])]
    public function toSearchableArray()
    {
        $title = '';

        foreach ($this->searchableFields as $field) {
            $title .= $this->$field . ' ';
        }

        $data['title'] = rtrim($title);

        return $data;
    }
}
