<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ProjectPlanning extends Model
{
    use HasFactory;

    protected $table = 'projects_planning';

    protected $fillable = [
        'project_id',
        'sale_start',
        'redaction_date',
        'adverts_date',
        'printer_date',
        'distribution_date',
        'appearance_date',
        'sale_started',
        'redaction_received',
        'adverts_received',
        'printer_received',
    ];


    /**
     * Get the project that owns the ProjectPlanning
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
