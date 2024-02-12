<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'type',
        'description',
        'solved',
        'complaint_date',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderLine()
    {
        return $this->belongsTo(OrderLine::class);
    }
}
