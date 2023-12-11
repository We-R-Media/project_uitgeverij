<?php

namespace App\Models;

use Akaunting\Money\Money;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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
        'contact_id',
        'administration_approved_at',
        'seller_approved_at',
        'email_sent_at',
        'notification_sent_at',
        'order_method_approval',
        'order_method_invoice',
        'order_date',
        'order_file',
        'order_file_2',
        'order_total_price',
        'deactivated_at',
        'validation_token',
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
     * Get the advertiser that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class);
    }

    /**
     * Get the contact that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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

    public function getLayoutAttribute()
    {
        $firstOrderLine = $this->orderLines->first();
        $projectLayout = $firstOrderLine->project->layout ?? null;

        if( !is_null($projectLayout) ) {
            return  $firstOrderLine->project->layout;
        }

        return null;
    }

    /**
     * Customize this logic based on when an order needs approval
     *
     * @return void
     */
    public function needsApproval()
    {
        return $this->approved_at === null;
    }

    /**
     * Get all of the layouts for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function layouts(): HasManyThrough
    {
        return $this->hasManyThrough(Layout::class, OrderLine::class);
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
                Alert::toast('Kan de totale prijs van de bestelling niet bijwerken', 'error');

                return redirect()->route('orders.edit', $current_order->id);
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


        /**
     * Update the total price of the order based on the associated order lines.
     *
     * This method calculates the total price by summing up the prices of all order lines
     * associated with the order and updates the 'order_total_price' attribute in the database.
     *
     * @return void
     * @throws \Exception If the update operation fails.
     */
    public function getInitialCredit()
    {
        return Money::EUR($this->advertiser->credit_limit, true) ?? '-';
    }

    /**
     * Update the total credit for the advertiser based on the associated order lines.
     *
     * This method calculates the remaining credit by subtracting the total price of all order lines
     * associated with the order from the advertiser's credit limit and updates the 'order_total_price'
     * attribute in the database. If the remaining credit is negative, it means the order exceeds the
     * credit limit, and an exception is thrown.
     *
     * @return \Money\Money The remaining credit in EUR.
     * @throws \Exception If the update operation fails or if the remaining credit is negative.
     */
    public function calculateTotalCredit()
    {
        try {
            $advertiserCreditLimit = $this->advertiser->credit_limit;
            $orderTotals = $this->order_total_price;

            if ($orderTotals > $advertiserCreditLimit) {
                error_log("Order total exceeds advertiser's credit limit. Order Total: $orderTotals, Credit Limit: $advertiserCreditLimit");
                throw new Log("Order total exceeds advertiser's credit limit.");
            }

            if ($advertiserCreditLimit === 0) {
                error_log("Advertiser's credit limit is zero, division by zero.");
                throw new Log("Advertiser's credit limit is zero, division by zero.");
            }

            $remainingCredit = ($advertiserCreditLimit - $orderTotals);

            return Money::EUR($remainingCredit, true);
        } catch (\Exception $e) {
            error_log("Failed to calculate total credit: " . $e->getMessage());
            throw new Log("Failed to calculate total credit: " . $e->getMessage());
        }
    }
}
