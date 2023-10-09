<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{

    public function getFormat() {
        return $format_groups = [
            [
                'format_name' => 'A4',
                
            ],
            [

            ],
        ];
    }

    use HasFactory;
}
