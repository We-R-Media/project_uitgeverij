<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertiser extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_mobile',
        'phone',
        'po_box',
        'postal_code',
        'province',
        'city',
        'comments',
        'contact_id',
        'deactivated_at',
        'blacklisted_at',
    ];

    /**
     * Get all of the contacts for the Advertiser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the invoice associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the reminder associated with the Advertiser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reminder(): HasOne
    {
       return $this->hasOne(Reminder::class);
    }

    /**
     * Get the order_line that owns the order line.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
