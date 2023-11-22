<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Laravel\Scout\Searchable;
use RealRashid\SweetAlert\Facades\Alert;

class Order extends BaseModel
{
    use HasFactory, SoftDeletes, Searchable;

    protected static function boot()
    {
        parent::boot();

        static::created(function ($order) {
            $order->updateOrderTotalPrice();
        });

        static::updated(function ($order) {
            $order->updateOrderTotalPrice();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'approved_at',
        'order_date',
        'order_total_price',
        'deactivated_at',
    ];

    /**
     * An array of fields that should be included while generating the title.
     *
     * @var array<string>
     */
    protected $titleGenerationAttributes = [
        'name',
    ];

    /**
     * An array of fields that should be included in the searchable data array for the model.
     *
     * @var array<string>
     */
    protected $searchableFields = [
        'name',
    ];

    /**
     * Get the project that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the advertiser that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class);
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

    /**
     * Update the total price of the order based on the associated order lines.
     *
     * This method calculates the total price by summing up the prices of all order lines
     * associated with the order and updates the 'order_total_price' attribute in the database.
     *
     * @return void
     * @throws \Exception If the update operation fails.
     */
    public function updateOrderTotalPrice()
    {
        $current_order = Order::findOrFail($this->id);

        try {
            $orderTotalPrice = $current_order->orderLines()->sum('price_with_discount');
            $update_current_order = $current_order->update(['order_total_price' => $orderTotalPrice]);

            if (!$update_current_order) {
                Log::info('Kan de totale prijs van de bestelling niet bijwerken: '. $current_order->id);

                throw new \Exception('Kan de totale prijs van de bestelling niet bijwerken');
            }

            Log::notice('De orderregels zijn succesvol bijgewerkt van order nummer: ' . $current_order->id );
            Alert::toast('De orderregels zijn succesvol bijgewerkt', 'success');

            return redirect()->route('orders.edit', $current_order->id);
        } catch (\Exception $e){
            Log::error('Error updating order total price: ' . $e->getMessage());
            Alert::toast('Er is iets fout gegaan tijdens het updaten van het totaalbedrag', 'error');

            return redirect()->back();
        }
    }
}
