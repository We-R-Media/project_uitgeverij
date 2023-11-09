<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Invoice extends BaseModel
{
    use HasFactory, SoftDeletes, Searchable;

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


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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
