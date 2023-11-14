<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Invoice extends BaseModel
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'title',
        'invoice_number',
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
     * An array of fields that should be included while generating the title.
     *
     * @var array<string>
     */
    protected $titleGenerationAttributes = [
        'invoice_number',
    ];

    /**
     * An array of fields that should be included in the searchable data array for the model.
     *
     * @var array<string>
     */
    protected $searchableFields = [
        'invoice_number',
    ];

    /**
     * Bootstrap the model and register the "creating" event.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * Get the phone associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class);
    }

    /**
     * Generate a unique invoice number in the format "202300001", "202300002", etc.
     *
     * @return string The generated invoice number.
     */
    public function generateInvoiceNumber()
    {
        return DB::transaction(function () {
            $year = date('Y');
            $prefix = $year;

            self::lockForUpdate()->get();

            $maxNumber = self::where('invoice_number', 'like', $prefix . '%')->max('invoice_number') ?: $prefix . '0000';

            $autoIncrementedPart = str_pad((int)substr($maxNumber, strlen($prefix)) + 1, 4, '0', STR_PAD_LEFT);

            $newInvoiceNumber = $prefix . $autoIncrementedPart;

            self::create(['invoice_number' => $newInvoiceNumber]);

            return $newInvoiceNumber;
        });
    }
}
