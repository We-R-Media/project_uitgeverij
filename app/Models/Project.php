<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Project extends BaseModel
{
    use HasFactory, SoftDeletes, Searchable;

    protected $primaryKey = 'id';

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'title',
        'layout_id',
        'tax_id',
        'designer',
        'printer',
        'client',
        'distribution',
        'release_name',
        'edition_name',
        'print_edition',
        'paper_format',
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
     * An array of fields that should be included while generating the title.
     *
     * @var array<string>
     */
    protected $titleGenerationAttributes = [
        'release_name',
    ];

    /**
     * An array of fields that should be included in the searchable data array for the model.
     *
     * @var array<string>
     */
    protected $searchableFields = [
        'release_name',
        'edition_name',
    ];

    /**
     * Get the orders associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get all of the groups for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formats(): HasMany
    {
        return $this->hasMany(Format::class);
    }

    /**
     * Get the tax that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }

    /**
     * Get the printer associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function printer(): HasOne
    {
        return $this->hasOne(Printer::class);
    }

    /**
     * Get the designer associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function designer(): HasOne
    {
        return $this->hasOne(Designer::class);
    }

    /**
     * Get the distributor associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function distributor(): HasOne
    {
        return $this->hasOne(Distributor::class);
    }

    /**
     * Get the client associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }


    /**
     * Get the layout that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layout(): BelongsTo
    {
        return $this->belongsTo(Layout::class);
    }

        /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs()
    {
        return 'project_index';
    }
}
