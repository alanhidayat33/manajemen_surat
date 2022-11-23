<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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
    return view('auth\login');
});

Auth::routes();
       
//akses semua
Route::group(['middleware' => ['auth', 'user-access:Admin,Maha,Kaur,Ktu,Dekan']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    //view Surat Masuk
    Route::get('/view-sm', [App\Http\Controllers\SuratMasukController::class, 'viewSm']);

    //view Surat Masuk
    Route::get('/view-sk', [App\Http\Controllers\SuratKeluarController::class, 'viewSk']);
});

//akses level admin only
Route::group(['middleware' => ['auth', 'user-access:Admin']], function () {
    //kelola data user
    Route::get('/view-user', [LoginController::class, 'viewUser']);

    //kelola surat masuk
    Route::get('/input-sm', [SuratMasukController::class, 'inputSm']);
    Route::post('/save-sm', [SuratMasukController::class, 'saveSm']);
    Route::get('/edit-sm/{id}', [SuratMasukController::class, 'editSm']);
    Route::post('/update-sm/{id}', [SuratMasukController::class, 'updateSm']);
    Route::get('/hapus-sm/{id}', [SuratMasukController::class, 'hapusSm']);

    //kelola surat keluar
    Route::get('/input-sk', [SuratMasukController::class, 'inputSk']);
    Route::post('/save-sk', [SuratMasukController::class, 'saveSk']);
    Route::get('/edit-sk/{id}', [SuratMasukController::class, 'editSk']);
    Route::post('/update-sk/{id}', [SuratMasukController::class, 'updateSk']);
    Route::get('/hapus-sk/{id}', [SuratMasukController::class, 'hapusSk']);
});
