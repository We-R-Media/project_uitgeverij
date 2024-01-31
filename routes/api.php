<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdvertiserController;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\InvoiceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::name('advertisers.')
//     ->name('relaties')
//     ->controller(AdvertiserController::class)
//     ->group(function () {
//         Route::post('/', 'send__data')->name('api-retrieve');
//     });

Route::post('relaties/send', [AdvertiserController::class, 'send__data']);
Route::get('relaties/get', [AdvertiserController::class, 'get__data']);

Route::get('/get', [APIController::class, 'get__data'])->name('api.get');
Route::get('/token', [APIController::class, 'get__token'])->name('token.get');
Route::get('/httpbin', [APIController::class, 'http__bin'])->name('http.bin');

// Route::name('invoices.')
//     ->name('facturen')
//     ->controller(InvoiceController::class)
//     ->group(function () {
//         Route::get('/', 'get__data')->name('api-retrieve');
//     });

