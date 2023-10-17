<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    protected $fillable = [
        'country',
        'zero',
        'low',
        'high',
    ];


    use HasFactory, SoftDeletes;

    /**
     * Get the project that owns the tax.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
