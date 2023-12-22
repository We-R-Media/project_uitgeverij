<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

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
        if (Gate::allows('isAdmin'))
        {     
            $users = User::paginate(12);

            $this->subpages = [
                'Alle gebruikers' => 'users.index',
                'Admin' => [
                    'name' => 'users.role',
                    'parameters' => ['admin'],
                ],
                'Verkoper' => [
                    'name' => 'users.role',
                    'parameters' => ['seller'],
                ],
                'Supervisor' => [
                    'name' => 'users.role',
                    'parameters' => ['supervisor'],
                ],
            ];

            return view('pages.users.index', compact('users'))
                ->with([
                    'pageTitleSection' => self::$page_title_plural,
                    'pageTitle' => self::$page_title_singular,
                    'subpagesData' => $this->getSubpages(),
                ]);
        }
    }

        /**
     * Display a filtered listing on role of the resource.
     */
    public function role(string $role = null)
    {
        $users = User::where('role', $role)->paginate(12);

        $this->subpages = [
            'Alle gebruikers' => 'users.index',
            'Admin' => [
                'name' => 'users.role',
                'parameters' => ['admin'],
            ],
            'Verkoper' => [
                'name' => 'users.role',
                'parameters' => ['seller'],
            ],
            'Supervisor' => [
                'name' => 'users.role',
                'parameters' => ['supervisor'],
            ],
        ];

        return view('pages.users.index', compact('users'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
                'subpagesData' => $this->getSubpages(),
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
        try {
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

            Alert::toast('De gebruiker is succesvol aangemaakt', 'success');

            return redirect()->route('users.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('users.index');
        }
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
        $user = User::findOrFail($id);

        return view('pages.users.edit', compact('user'))
            ->with([
                'pageTitleSection' => self::$page_title_plural,
                'pageTitle' => self::$page_title_singular,
                'subpages' =>$this->getSubpages($id),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        try {
            DB::transaction(function () use($request, $user_id) {
                User::where('id', $user_id)->update([
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

            Alert::toast('De gebruiker is succesvol aangepast', 'success');

            return redirect()->route('users.index');
        } catch (\Exception $e){
            Alert::toast('Er is iets fout gegaan', 'error');

            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $user = User::find($user_id);

        if($user) {
            $user->delete();

            Alert::toast('De gebruiker is verwijderd.', 'info');
        }

        return redirect()->route('users.index');
    }
}
