<?php

use App\Http\Controllers\BarangController;
use App\Models\Barang;
use Illuminate\Http\Client\Request;
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
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'read']);

Route::get('/barang/search/{id}', [BarangController::class, 'search']);

Route::post('/barang/store', function(Request $request) {

});

Route::put('/barang/update', [BarangController::class, 'update']);

Route::get('/barang/delete/{id}', [BarangController::class, 'delete']);
