<?php

use App\Http\Controllers\StationeryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/form', [StationeryController::class, 'form']);
Route::post('/store', [StationeryController::class, 'store'])->name('stationery.store');
Route::get('/purchase/{id}', [StationeryController::class, 'detail']);
Route::get('/list', [StationeryController::class, 'list']);
Route::post('/get-data', [StationeryController::class, 'getData'])->name('get-data');
