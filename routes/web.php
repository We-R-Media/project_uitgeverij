<?php

use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/


Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [
        HomeController::class, 'index'
    ] )->name('home');

    Route::controller(OrderController::class)->group(function() {
        Route::get('/orders', 'index')->name('orders.page');
        Route::post('/orders/create', 'create')->name('orders.create');
    });

    Route::controller(AdvertiserController::class)->group(function() {
        Route::get('/advertisers', 'index')->name('advertisers.page');
        Route::get('/advertisers/{id}', 'showDetails')->name('advertisers.details');

        Route::get('/advertisers/process', 'processForm')->name('advertisers.process');

        Route::match(['get'], '/advertisers/create', 'create')->name('advertisers.create');
    });

    Route::controller(ContactController::class)->group(function() {
        Route::get('/contacts', 'index')->name('contacts.page');

        Route::match(['get', 'post'], '/contacts/create', 'create')->name('contacts.create');
    });

    // Route::controller(TaxController::class)->group(function() {
    //     Route::get('/tax', 'index')->name('tax.page');

    //     Route::match(['get', 'post'], '/tax/create', 'create')->name('tax.create');
    // });

    // Route::controller(FormatController::class)->group(function() {
    //     Route::get('/formats', 'index')->name('formats.page');
    //     Route::post('/formats/create', 'create')->name('formats.create');
    // });

    Route::controller(ProjectController::class)->group(function() {
        Route::get('/projects', 'index')->name('projects.page');
        Route::get('/projects/{id}', 'edit')->name('projects.edit');
        Route::get('/projects/details', 'showDetails')->name('projects.details');

        // Route::match(['get', 'post'], '/projects/create', 'create')->name('projects.create');
    });

    // Route::controller(LayoutController::class)->group(function() {
    //     Route::get('/layouts', 'index')->name('layouts.page');

    //     Route::match(['get', 'post'], '/layouts/create', 'create')->name('layouts.create');
    // });

    Route::controller(InvoiceController::class)->group(function() {
        Route::get('/invoices', 'index')->name('invoices.page');
    });

    Route::controller(PDFController::class)->group(function() {
        Route::get('pdf-generate/', 'PDFGenerate')->name('pdf.generate');
    });

    // Route::controller(ReminderController::class)->group(function() {
    //     Route::get('/reminders', 'index')->name('reminders.page');
    //     Route::post('/reminders/create', 'create')->name('reminders.create');
    // });

    // Route::view('/settings', 'pages.settings')->name('settings.page');
});

Route::fallback(function () {
    abort(404);
});
