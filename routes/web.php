<?php

use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\FormatGroupController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\PDFController;
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
        Route::post('/orders/create', 'create')->name('orders.create');
    });

    Route::controller(AdvertiserController::class)->group(function() {
        Route::get('/advertisers', 'index')->name('advertisers.page');
        Route::post('/advertisers/show', 'show')->name('advertisers.show');
        Route::post('/advertisers/create', 'create')->name('advertisers.create');
        Route::get('/advertisers/process', 'process')->name('advertisers.process');
        Route::get('/advertisers/details', 'details')->name('advertisers.details');
    });

    Route::controller(ContactController::class)->group(function() {
        Route::get('/contacts', 'index')->name('contacts.page');
        Route::post('/contacts/create', 'create')->name('contacts.create');
    });

    Route::controller(TaxController::class)->group(function() {
        Route::get('/tax', 'index')->name('tax.page');
        Route::post('/tax/create', 'create')->name('tax.create');
    });

    Route::controller(FormatController::class)->group(function() {
        Route::get('/formats', 'index')->name('formats.page');
        Route::get('/formats', 'show')->name('formats.show');
        Route::post('/formats/create', 'create')->name('formats.create');
    });

    Route::controller(FormatGroupController::class)->group(function() {
        Route::post('/formatgroup/create')->name('formatgroup.create');
    });


    Route::controller(ProjectController::class)->group(function() {
        Route::get('/projects', 'index')->name('projects.page');
        Route::post('/projects/create', 'create')->name('projects.create');
        Route::get('/projects/details', 'showDetails')->name('projects.details');
    });

    Route::controller(LayoutController::class)->group(function() {
        Route::get('/layouts', 'index')->name('layouts.page');
        Route::post('/layouts/create', 'create')->name('layouts.create');
    });

    Route::controller(InvoiceController::class)->group(function() {
        Route::get('/invoices', 'index')->name('invoices.page');
    });

    Route::controller(PDFController::class)->group(function() {
        Route::get('pdf-generate/', 'PDFGenerate')->name('pdf.generate');
    });

    Route::controller(ReminderController::class)->group(function() {
        Route::get('/reminders', 'index')->name('reminders.page');
        Route::post('/reminders/create', 'create')->name('reminders.create');
    });

    Route::view('/settings', 'pages.settings')->name('settings.page');  
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

