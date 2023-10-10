<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Format extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Fillable fields for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'page_count',
        'price',
        'description'
    ];

    /**
     * Get the project associated with the format.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
