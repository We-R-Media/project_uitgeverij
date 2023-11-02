<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {

        $pageTitle = 'Pagina titel!';

        return view('pages.settings', compact('pageTitle'));
    }
}
