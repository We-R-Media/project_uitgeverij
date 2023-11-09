<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class BaseModel extends Model
{
    protected $searchableFields = [
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->title)) {
                $modelName = class_basename($model);
                $token = fake()->uuid();
                $model->title = "{$modelName} - {$token}";
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
        $title = rtrim($title);

        $data['title'] = $title;

        return $data;
    }
}
