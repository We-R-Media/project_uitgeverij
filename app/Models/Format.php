<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Format extends BaseModel
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'format_title',
        'size',
        'measurement',
        'ratio',
        'project_id',
        'price',
        'price_with_tax',
        'page_count',
        'description',
    ];

    /**
     * Get the groups associated with the format.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the orderlines associated with the Format
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderlines(): HasOne
    {
        return $this->hasOne(OrderLine::class);
    }
}
