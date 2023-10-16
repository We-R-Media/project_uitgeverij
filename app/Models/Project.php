<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
     * Get the orders associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the formats associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formats(): HasMany
    {
        return $this->hasMany(Format::class, 'project_id');
    }

    /**
     * Get the tax associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tax(): HasOne
    {
        return $this->hasOne(Tax::class);
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
     * Get the distributor associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function distributor(): HasOne
    {
        return $this->hasOne(Distributor::class);
    }

    /**
     * Get the client associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

    /**
     * Get the layout associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function layout(): HasOne
    {
        return $this->hasOne(Layout::class);
    }
}
