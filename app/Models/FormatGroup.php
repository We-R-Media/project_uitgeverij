<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatGroup extends Model
{
    use HasFactory;

    protected $table = 'format_group';

    protected $fillable = [
        'id',
        'group_name',
    ];

    // public function formats(): hasMany {
    //     return $this->hasMany(Format::class);
    // }
}
