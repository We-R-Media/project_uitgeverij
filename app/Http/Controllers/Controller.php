<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $subpages = [];

    /**
     * Get subpages set from constrcutor
     *
     * @return void
     */
    public function getSubpages()
    {
        return $this->subpages;
    }
}
