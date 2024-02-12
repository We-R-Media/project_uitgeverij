<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderLine extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'base_price',
        'discount',
        'material',
        'price_with_discount',
    ];

    /**
     * Get the order that owns the order line.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the project that owns the OrderLine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the format that owns the OrderLine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function format(): BelongsTo
    {
        return $this->belongsTo(Format::class);
    }

    /**
     * Get the complaint associated with the OrderLine
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function complaint(): HasOne
    {
        return $this->hasOne(Complaint::class);
    }
}
