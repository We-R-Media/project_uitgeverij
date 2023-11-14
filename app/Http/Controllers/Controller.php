<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
    public function getSubpages( $id = null )
    {
        return [
            'subpages' => $this->subpages,
            'id' => $id,
        ];
    }
}
