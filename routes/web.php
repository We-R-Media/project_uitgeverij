<?php

use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SettingsController;

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

    Route::name('orders.')
        ->prefix('orders')
        ->controller(OrderController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'create')->name('create');
        });


    Route::name('advertisers.')
        ->prefix('advertisers')
        ->controller(AdvertiserController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/process','processForm')->name('process');
            Route::get('/details', 'showDetails')->name('details');
            Route::post('/create', 'create')->name('create');
        });

    Route::name('contacts.')
        ->prefix('contacts')
        ->controller(ContactController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'create')->name('create');
        });

    // Route::name('tax.')
    //     ->prefix('tax')
    //     ->controller(TaxController::class)
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('/create', 'create')->name('create');
    //     });

    Route::name('projects.')
        ->prefix('projects')
        ->controller(ProjectController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/details', 'showDetails')->name('details');
            Route::post('/create', 'create')->name('create');
        });

    // Route::name('layouts.')
    //     ->prefix('layouts')
    //     ->controller(LayoutController::class)
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('/create', 'create')->name('create');
    //     });

    Route::name('invoices.')
        ->prefix('invoices')
        ->controller(InvoiceController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::name('pdf.')
        ->prefix('pdf-generate')
        ->controller(PDFController::class)
        ->group(function () {
            Route::get('/', 'PDFGenerate')->name('generate');
        });

    // Route::name('reminders.')
    //     ->prefix('reminders')
    //     ->controller(ReminderController::class)
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('/create', 'create')->name('create');
    //     });

    Route::name('settings.')
        ->prefix('settings')
        ->controller(SettingsController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    // Route::controller(FormatController::class)->group(function() {
    //     Route::get('/formats', 'index')->name('formats.page');
    //     Route::post('/formats/create', 'create')->name('formats.create');
    // });
});

Route::fallback(function () {
    abort(404);
});

