<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
<<<<<<< HEAD
    /**
     * Fillable fields for mass assignment.
     *
     * @var array
     */
=======
    use HasFactory;

    protected $table = 'companies';

>>>>>>> 7647ae6ba2d5d1243e3579e2b4057d22fa3cf2f2
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
