<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Order extends BaseModel
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'layout_name',
        // 'city_name',
        // 'logo',
    ];

    // /**
    //  * An array of fields that should be included in the searchable data array for the model.
    //  *
    //  * @var array<string>
    //  */
    // protected $searchableFields = [
    //     'layout_name',
    //     'year',
    // ];

    /**
     * Get the project that owns the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the phone associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(): HasOne
    {
        return $this->hasOne(Advertiser::class);
    }

    /**
     * Get the order lines associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}
