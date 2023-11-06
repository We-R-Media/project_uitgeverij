<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    private static $page_title_singular = 'Instelling';
    private static $page_title_plural = 'Instellingen';


    public function __construct()
    {
        $this->subpages = [
            'Formaten' => 'settings.formats',
            'Verkopers' => 'sellers.index',
            'Layouts' => 'settings.layouts',
            'BTW' => 'settings.tax',
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

    public function formats() {

        $subpages = $this->getSubpages() ?? false;

        return view('pages.settings.formats', compact('subpages'))
        ->with([
            'pageTitlteSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
        ]);
    }

    public function layouts() {

        $subpages = $this->getSubpages() ?? false;

        return view('pages.settings.layouts', compact('subpages'))
        ->with([
            'pageTitlteSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
        ]);
    }

    public function tax() {
        $subpages = $this->getSubpages() ?? false; 

        return view('pages.settings.tax', compact('subpages'))
        ->with([
            'pageTitleSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
        ]);
    }
}
