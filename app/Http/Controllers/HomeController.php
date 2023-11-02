<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private static $page_title_singular = 'Dashboard';
    private static $page_title_plural = 'Dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home')
            ->with([
                'pageTitle' => self::$page_title_singular,
                'pageTitleSection' => self::$page_title_plural,
            ]);
    }
}
