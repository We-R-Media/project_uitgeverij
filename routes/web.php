<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VATController;
use App\Http\Controllers\FormatController;
use App\Http\Livewire\TotalSum;
use App\Http\UserResource;

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

    Route::prefix('companies')->group(function() {
        $controller = CompanyController::class;

        Route::get('/', [$controller, 'index'])->name('companies.page');
        Route::post('create', [$controller, 'create'])->name('companies.create');
    });

    Route::prefix('contacts')->group(function() {
        $controller = ContactController::class;

        Route::get('/', [$controller, 'index'])->name('contacts.page');
        Route::post('create', [$controller, 'create'])->name('contacts.create');
    });

    Route::prefix('vat')->group(function() {
        $controller = VATController::class;

        Route::get('/', [$controller, 'index'])->name('vat.page');
        Route::post('create', [$controller, 'create'])->name('vat.create');
    });

    Route::prefix('formats')->group(function() {
        $controller = FormatController::class;

        Route::get('/', [$controller, 'index'])->name('formats.page');
        Route::post('create', [$controller, 'create'])->name('formats.create');
    });

    Route::prefix('projects')->group(function() {
        $controller = ProjectController::class;

        Route::get('/', [$controller, 'index'])->name('projects.page');
        Route::post('create', [$controller, 'create'])->name('projects.create');
    });


    route::view('/orders', 'pages.orders')->name('orders.page');
    route::view('/invoices', 'pages.invoices')->name('invoices.page');
    route::view('/settings', 'pages.settings')->name('settings.page');

    Route::get('/user/{id}', function (string $id) {
        return new UserResource(User::findOrFail($id));
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');