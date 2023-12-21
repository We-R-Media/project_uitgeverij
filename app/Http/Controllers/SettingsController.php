<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    private static $page_title_section = 'Instellingen';



    
    public function __construct()
    {
        $this->subpages = [
            'Layouts' => 'layouts.index',
            'BTW' => 'tax.index',
            'Aanmaningen' => 'reminders.index',
            'Gebruikers' => 'users.index',
        ];
    }

    public function filterRole()
    {
        if (Gate::allows('isSupervisor') || Gate::allows('isSeller')) {
            unset($this->subpages['Gebruikers']);
        }
    }

    public function index() {
        $this->filterRole();
    
        if(Gate::allows('isSupervisor') || Gate::allows('isAdmin')) {
            return view('pages.settings')
                ->with([
                    'pageTitleSection' => self::$page_title_section,
                    'subpagesData' => $this->getSubpages(),
                ]);
        }
    }
    
    }
