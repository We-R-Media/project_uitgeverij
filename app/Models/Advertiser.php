<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Advertiser extends BaseModel
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'name',
        'email',
        'phone_mobile',
        'phone',
        'address',
        'po_box',
        'credit_limit',
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
        return $this->hasMany(Contact::class);
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
     * Get all of the orders for the Advertiser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
