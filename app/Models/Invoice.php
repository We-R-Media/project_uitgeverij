<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    protected $fillable = [
        'id',
        'advertiser_id',
        'invoice_date',
        'post_method',
        'first_reminder',
        'second_reminder',
        'third_reminder',
        'payed_at',
        'deleted_at',
        'created_at',
        'updated_ad',
    ];

    use HasFactory, SoftDeletes;

    /**
     * Get the phone associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class);
    }
}
