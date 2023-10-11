<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model

{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'id',
        'format_id',
        'layout_id',
        'designer_id',
        'printer_id',
        'client_id',
        'distribution_id',
        'btw_country_id',
        'release_name',
        'edition_name',
        'print_edition',
        'pages_redaction',
        'pages_adverts',
        'pages_total',
        'paper_type_cover',
        'paper_type_interior',
        'color_cover',
        'color_interior',
        'ledger',
        'journal',
        'department',
        'year',
        'revenue_goals',
        'comments',
    ];

    public function formats() {
        return $this->hasMany(Format::class);
    }
}
