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
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;


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

            Route::get('/nieuw', 'create')->name('create');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/planning', 'planning')->name('planning');
            Route::get('/{id}/verwijderen', 'destroy')->name('destroy');

            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
    });

    Route::name('orders.')
        ->prefix('orders')
        ->controller(OrderController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/nieuw', 'create')->name('create');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/verwijderen', 'destroy')->name('destroy');
            Route::get('/{id}/print', 'print')->name('print');
            Route::get('/{id}/klachten', 'complaints')->name('complaints');

            Route::post('/store', 'store')->name('store');
            Route::post('/{id}/update', 'update')->name('update');
            Route::post('/{advertiser}/verzenden', 'approval')->name('approval');
            Route::post('/{id}/akkoord', 'approved')->name('approved');

            Route::delete('/{id}', 'delete')->name('delete');
        });

    Route::name('advertisers.')
        ->prefix('relaties')
        ->controller(AdvertiserController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/nieuw', 'create')->name('create');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/verwijderen', 'destroy')->name('destroy');
            Route::get('/{id}/contacten', 'contacts')->name('contacts');
            Route::get('/{id}/orders', 'orders')->name('orders');

            Route::post('/store', 'store')->name('store'); // FIX
            Route::post('/update', 'update')->name('update'); // FIX
        });

    Route::name('invoices.')
        ->prefix('facturen')
        ->controller(InvoiceController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/nieuw', 'create')->name('create');
            Route::get('/{id}/bewerken', 'edit')->name('edit');
            Route::get('/{id}/verwijderen', 'destroy')->name('destroy');

            Route::post('/store', 'store')->name('store'); // FIX
            Route::post('/update', 'update')->name('update'); // FIX
        });


    Route::middleware(['admin.check'])->group(function () {
            Route::name('settings.')
            ->prefix('instellingen')
            ->controller(SettingsController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });

        Route::name('tax.')
            ->prefix('btw')
            ->controller(TaxController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/nieuw', 'create')->name('create');
                Route::get('/{id}/bewerken', 'edit')->name('edit');
                Route::get('/{id}/verwijderen', 'destroy')->name('destroy');

                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
            });


        Route::name('reminders.')
            ->prefix('aanmaningen')
            ->controller(ReminderController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/nieuw', 'create')->name('create');
                Route::get('/{id}/bewerken', 'edit')->name('edit');

                Route::post('/{id}/bijwerken', 'update')->name('update');
                Route::post('/opslaan', 'store')->name('store');
            });

        Route::name('users.')
            ->prefix('gebruikers')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{role?}', 'index')->name('index.role');
                Route::get('/nieuw', 'create')->name('create');
                Route::get('/{id}/bewerken', 'edit')->name('edit');
                Route::get('/{id}/verwijderen', 'destroy')->name('destroy');

                Route::post('/opslaan', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
            });

        Route::name('layouts.')
            ->prefix('layouts')
            ->controller(LayoutController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}/bewerken', 'edit')->name('edit');
                Route::get('/nieuw', 'create')->name('create');
                Route::get('/{id}/verwijderen', 'destroy')->name('destroy');

                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::post('/upload', 'upload')->name('upload');
            });

        Route::name('formats.')
            ->prefix('formaten')
            ->controller(FormatController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/nieuw', 'create')->name('create');
                Route::get('/{id}/bewerken', 'edit')->name('edit');
                Route::get('/{id}/verwijderen', 'destroy')->name('destroy');

                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
            });
    });

    Route::name('pdf.')
        ->prefix('pdf')
        ->controller(PDFController::class)
        ->group(function () {
            Route::get('/{id}', 'approval')->name('generate');
        });

    Route::name('email.')
        ->prefix('emails')
        ->controller(EmailController::class)
        ->group(function () {
            Route::get('/{id}/akkoord', 'approval')->name('approval');
        });

    Route::get('/search', [ SearchController::class, 'search'])->name('search');

});



Route::fallback(function () {
    abort(404);
});
