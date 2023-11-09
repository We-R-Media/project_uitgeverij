<?php

use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SearchController;
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

    Route::name('projects.')
        ->prefix('projecten')
        ->controller(ProjectController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/planning', 'planning')->name('planning');
            Route::get('/{id}/calculatie', 'calculation')->name('calculation');
            Route::get('/creëren', 'create')->name('create');

            Route::post('/opslaan', 'store')->name('store');
            Route::post('/bijwerken', 'update')->name('update');

            Route::delete('/{id}', 'delete')->name('delete');
        });

    Route::name('orders.')
        ->prefix('orders')
        ->controller(OrderController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/requests', 'requests')->name('requests');
            Route::get('/{id}/print', 'print')->name('print');
            Route::get('/{id}/artikelen', 'articles')->name('articles');
            Route::get('/{id}/klachten', 'complaints')->name('complaints');
            Route::get('/{id}/creëren/', 'create')->name('create');

            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');

            Route::delete('/{id}', 'delete')->name('delete');
        });


    Route::name('advertisers.')
        ->prefix('relaties')
        ->controller(AdvertiserController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/contacten', 'contacts')->name('contacts');
            Route::get('/{id}/orders', 'orders')->name('orders');
            Route::get('/creëren', 'create')->name('create');

            Route::post('/opslaan', 'store')->name('store');
            Route::post('/{id}/bijwerken', 'update')->name('update');
        });

    Route::name('contact.')
        ->prefix('contacten')
        ->controller(ContactController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/creëren', 'create')->name('create');

            Route::post('/opslaan', 'store')->name('store');
            Route::post('/bijwerken', 'update')->name('update');
        });

    Route::name('tax.')
        ->prefix('btw')
        ->controller(TaxController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/creëren', 'create')->name('create');

            Route::post('/opslaan', 'store')->name('store');
            Route::post('/{id}/bijwerken', 'update')->name('update');
            Route::delete('/verwijderen', 'delete')->name('delete');
        });

    Route::name('invoices.')
        ->prefix('facturen')
        ->controller(InvoiceController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::name('pdf.')
        ->prefix('pdf')
        ->controller(PDFController::class)
        ->group(function () {
            Route::get('/', 'PDFGenerate')->name('generate');
        });

    Route::name('reminders.')
        ->prefix('aanmaningen')
        ->controller(ReminderController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::name('settings.')
        ->prefix('instellingen')
        ->controller(SettingsController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::name('sellers.')
        ->prefix('verkopers')
        ->controller(SellerController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::post('/{id}/bijwerken', 'update')->name('update');
        });

    Route::name('layouts.')
        ->prefix('layouts')
        ->controller(LayoutController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/creëren', 'create')->name('create');

            Route::post('/opslaan', 'store')->name('store');
            Route::post('/{id}/bijwerken', 'update')->name('update');
        });


    Route::name('formats.')
        ->prefix('formaten')
        ->controller(FormatController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/creëren', 'create')->name('create');
            Route::get('/{id}/bewerken', 'edit')->name('edit');

            Route::post('/opslaan', 'store')->name('store');
            Route::post('/{id}/bijwerken', 'update')->name('update');
        });

    Route::get('/search', [ SearchController::class, 'search'])->name('search');

});

Route::fallback(function () {
    abort(404);
});
