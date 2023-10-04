<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

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
}
