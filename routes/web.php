<?php

use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\OrderController;
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



Route::group(['middleware' => 'auth'], function() {

    Route::controller(OrderController::class)->group(function() {
        Route::get('/orders', 'index')->name('orders.page');
    });

    Route::controller(AdvertiserController::class)->group(function() {
        route::get('/advertisers', 'index')->name('advertisers.page');
        Route::post('/advertisers/create', 'create')->name('advertisers.create');
    });

    Route::controller(ContactController::class)->group(function() {
        Route::get('/contacts', 'index')->name('contacts.page');
        Route::post('/contacts/create', 'create')->name('contacts.create');
    });

    Route::controller(TaxController::class)->group(function() {
        Route::get('/tax', 'index')->name('tax.page');
        Route::get('/tax/show', 'show')->name('tax.show');
        Route::post('/tax/create', 'create')->name('tax.create');
    });

    Route::controller(FormatController::class)->group(function() {
        Route::get('/formats', 'index')->name('formats.page');
        Route::post('/formats/create','create')->name('formats.create');
    });


    Route::controller(ProjectController::class)->group(function() {
        route::get('/projects', 'index')->name('projects.page');
        route::post('/projects', 'create')->name('projects.create');
    });

    Route::controller(InvoiceController::class)->group(function() {
        route::view('/invoices', 'pages.invoices')->name('invoices.page');
        route::view('/settings', 'pages.settings')->name('settings.page');
    });

    // Route::get('/user/{id}', function (string $id) {
    //     return new UserResource(User::findOrFail($id));
    // });
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
