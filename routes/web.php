<?php

use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\FormatController;
use App\Http\UserResource;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('pages.dashboard');
});

// Grouped routes for better performance

    $controllers = [
        CompanyController::class,
        ContactController::class,
        VATController::class,
        FormatController::class,
        ProjectController::class,
    ];

Route::group(['middleware' => 'auth'], function() {
    route::view('/orders', 'pages.orders')->name('orders.page');

    route::get('/advertisers', [AdvertiserController::class, 'index'])->name('advertisers.page');
    Route::post('/advertisers/create', [AdvertiserController::class, 'create'])->name('advertisers.create');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.page');
    Route::post('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

    Route::get('/btw', [BtwController::class, 'index'])->name('btw.page');
    Route::post('/btw/create', [BtwController::class, 'create'])->name('btw.create');
    Route::get('/btw/show', [BtwController::class, 'show'])->name('btw.show');

    Route::get('/formats', [FormatController::class, 'index'])->name('formats.page');
    Route::post('/formats/create', [FormatController::class, 'create'])->name('formats.create');

    route::get('/projects', [ProjectController::class, 'index'])->name('projects.page');
    route::post('/projects', [ProjectController::class, 'create'])->name('projects.create');

    route::view('/invoices', 'pages.invoices')->name('invoices.page');
    route::view('/settings', 'pages.settings')->name('settings.page');

    // Route::get('/user/{id}', function (string $id) {
    //     return new UserResource(User::findOrFail($id));
    // });
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
