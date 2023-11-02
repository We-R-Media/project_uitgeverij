<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    private static $page_title_singular = 'Instelling';
    private static $page_title_plural = 'Instellingen';


    public function __construct()
    {
        $this->subpages = [
            'Formaten' => '/',
            'Verkopers' => '/',
            'Layouts' => '/',
            'BTW' => '/',
        ];
    }




    public function index() {

        $subpages = $this->getSubpages() ?? false;


        return view('pages.settings', compact('subpages'))
        ->with([
            'pageTitleSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
        ]);
    }
}
