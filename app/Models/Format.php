<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{

    protected $table = 'formats';

    protected $fillable = [
        'id',
        'format_name',
        'group_id',
        'size',
        'measurement',
        'price',
    ];

    public function format_group(): belongsTo {
        return $this->belongsTo(Project::class);
    }


    use HasFactory;
}
