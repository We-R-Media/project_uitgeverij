<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;

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
    route::view('/relaties', 'pages.companies')->name('companies.page');
    route::view('/projecten', 'pages.projects')->name('projects.page');
    route::view('/facturen', 'pages.invoices')->name('invoices.page');
    route::view('/instellingen', 'pages.settings')->name('settings.page');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');