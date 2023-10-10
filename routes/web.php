<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Livewire\TotalSum;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.dashboard');
});

// Grouped routes for better performance

Route::group(['middleware' => 'auth'], function() {

    route::view('/orders', 'pages.orders')->name('orders.page');

    route::get('/companies', [CompanyController::class, 'index'])->name('companies.page');
    Route::post('/companies/create', [CompanyController::class, 'create'])->name('companies.create');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.page');
    Route::post('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');


    route::get('/projecten', [ProjectController::class, 'index'])->name('projects.page');
    route::post('/projecten', [ProjectController::class, 'create'])->name('projects.create');

    route::view('/facturen', 'pages.invoices')->name('invoices.page');

    route::view('/instellingen', 'pages.settings')->name('settings.page');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');