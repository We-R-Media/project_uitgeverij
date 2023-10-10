<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Fillable fields for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'company_name',
        'company_isactive',
        'mailbox',
        'postal_code',
        'city',
        'province',
       'phone_mobile',
       'phone_number',
    ];
}
