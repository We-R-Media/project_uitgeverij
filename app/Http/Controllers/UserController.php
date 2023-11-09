<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private static $page_title_plural = 'Gebruikers';
    private static $page_title_singular = 'Gebruiker';

    public function __construct() 
    {
        $this->subpages = [
            'Formaten' => 'formats.index',
            'Layouts' => 'layouts.index',
            'BTW' => 'tax.index',
            'Aanmaningen' => 'reminders.index',
            'Gebruikers' => 'users.index',
        ];
    }


    /**
     * Display a listing of the resource.
     */

    public function index(string $role = null)
    {
        $subpages = $this->getSubpages() ?? false;

        $aliases = [
            'admin' => 'Beheerder',
            'seller' => 'Verkoper',
            'supervisor' => 'Administratie',
        ];

        if ($role === 'seller') {
            $users = User::where('role', 'seller')->get();
        } elseif ($role === 'supervisor') {
            $users = User::where('role', 'supervisor')->get();
        } else {
            $users = User::all();

        }

        return view('pages.users.index', compact('users'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
                'subpages' => $subpages,
                'aliases' => $aliases,
            ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subpages = $this->getSubpages() ?? false;

        return view('pages.users.create')
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
                'subpages' => $subpages,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'initial' => $request->input('initial'),
                'preposition' => $request->input('preposition'),
                'gender' => $request->input('gender'),
                'role' => $request->input('role'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        });
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, string $role)
    {
        $user = User::where('role', $role)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, string $id)
    {
        $subpages = $this->getSubpages();
        $user = User::findOrFail($id);

        return view('pages.users.edit', compact('user'))
        ->with([
            'pageTitleSection' => self::$page_title_plural,
            'pageTitle' => self::$page_title_singular,
            'subpages' => $subpages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        DB::transaction(function () use($request, $id) {
            User::where('id', $id)->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'initial' => $request->input('initial'),
                'preposition' => $request->input('preposition'),
                'gender' => $request->input('gender'),
                'role' => $request->input('role'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        });
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
