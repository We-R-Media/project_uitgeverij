<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'period_first',
        'period_second',
        'period_third',
        'administration_cost_first',
        'administration_cost_second',
        'contact_id',
    ];

    public function advertiser() {
        return $this->belongsTo(Advertiser::class);
    }

    /**
     * Get the contact associated with the Reminder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
