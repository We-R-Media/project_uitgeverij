<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    protected $titleGenerationAttributes = [];

    /**
     * An array of fields that should be included in the searchable data array for the model.
     *
     * @var array<string>
     */
    protected $searchableFields = [
        'invoice_number',
    ];

    /**
     * Get the phone associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }
}
