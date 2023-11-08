<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    private static $page_title = 'Instelling';
    private static $page_title_section = 'Instellingen';


    public function __construct()
    {
        $this->subpages = [
            'Formaten' => 'formats.index',
            'Verkopers' => 'sellers.index',
            'Layouts' => 'layouts.index',
            'BTW' => 'tax.index',
            'Aanmaningen' => 'reminders.index',
        ];
    }

    public function index() {

        $subpages = $this->getSubpages() ?? false;

        return view('pages.settings', compact('subpages'))
            ->with([
                'pageTitleSection' => self::$page_title_section,
            ]);
    }
}
