<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

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

Auth::routes();
       
//akses semua
Route::group(['middleware' => ['auth', 'user-access:Admin,Maha,Kaur,Ktu,Dekan']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/view-sm', [App\Http\Controllers\SuratMasukController::class, 'viewSm']);
});

//akses level admin only
Route::group(['middleware' => ['auth', 'user-access:admin']], function () {
    //kelola data user
    Route::get('/view-user', [LoginController::class, 'viewUser']);
});
