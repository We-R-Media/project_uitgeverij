<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

    /**
     * Get the formats associated with the project.
     */
    public function formats() : HasMany
    {
        return $this->hasMany(Format::class, 'project_id');
    }
}
