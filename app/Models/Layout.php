<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layout extends BaseModel
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'layout_name',
        'city_name',
        'logo',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->title = $post->layout_name;
        });
    }

    /**
     * An array of fields that should be included in the searchable data array for the model.
     *
     * @var array<string>
     */
    protected $searchableFields = [
        'layout_name',
    ];

    /**
     * Get the project associated with the layout.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
