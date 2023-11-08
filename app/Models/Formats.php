<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formats extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'size',
        'measurement',
        'price',
        'page_count',
        'description'
    ];
}
