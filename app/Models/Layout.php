<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layout extends Model
{
    use HasFactory, SoftDeletes;

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
     * Get the project associated with the layout.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
