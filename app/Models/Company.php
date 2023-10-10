<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Fillable fields for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'contact_id',
        'company_name',
        'company_isactive',
        'mailbox',
        'postal_code',
        'city',
        'province',
       'phone_mobile',
       'phone_number',
    ];
    use HasFactory;
}
