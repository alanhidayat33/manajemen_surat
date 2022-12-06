<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('login');
});

Auth::routes();
       
//akses semua
Route::group(['middleware' => ['auth', 'user-access:Admin,Direktur,Wadir,Ktu,Kaur,Maha,Dosen']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    //view Surat Masuk
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

    //view Surat Masuk
    Route::get('/view-sm', [App\Http\Controllers\SuratMasukController::class, 'viewSm']);

    //view Surat Masuk
    Route::get('/view-sk', [App\Http\Controllers\SuratKeluarController::class, 'viewSk']);

    //view Surat Masuk
    Route::get('/view-jenis', [App\Http\Controllers\JenisSuratController::class, 'viewJenis']);

    Route::get('/download-lembar/{id}',[App\Http\Controllers\DisposisiController::class, 'downloadDisp']);
    Route::get('/preview-lembar/{id}',[App\Http\Controllers\DisposisiController::class, 'previewDisp']);
});

//akses level admin only
Route::group(['middleware' => ['auth', 'user-access:Admin']], function () {
    //kelola data user
    Route::get('/view-user', [UserController::class, 'viewUser']);
    Route::get('/input-user', [UserController::class, 'inputUser']);
    Route::post('/save-user', [UserController::class, 'saveUser']);
    Route::get('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::post('/update-user/{id}', [UserController::class, 'updateUser']);
    Route::get('/hapus-user/{id}', [UserController::class, 'hapusUser']);

    //Kelola Jenis surat
    Route::get('/input-jenis', [JenisSuratController::class, 'inputJenis']);
    Route::post('/save-jenis', [JenisSuratController::class, 'saveJenis']);
    Route::get('/edit-jenis/{id}', [JenisSuratController::class, 'editJenis']);
    Route::post('/update-jenis/{id}', [JenisSuratController::class, 'updateJenis']);
    Route::get('/hapus-jenis/{id}', [JenisSuratController::class, 'hapusJenis']);
});

//akses Direktur & Wadir
Route::group(['middleware' => ['auth', 'user-access:Direktur,Wadir,Admin']], function () 
{
     //kelola disposisi
    Route::get('/input-disp/{id}',[DisposisiController::class, 'inputDisp']);
    Route::post('/save-disp',[DisposisiController::class, 'saveDp']);
    Route::post('/update-disp/{id}',[DisposisiController::class, 'updateDp']);
});

//akses Kepala Tata Usaha
Route::group(['middleware' => ['auth', 'user-access:Kaur,Admin']], function () 
{
     //kelola disposisi
    Route::get('/view-disposisi/{id}',[DisposisiController::class, 'viewDp']);
    Route::get('/input-disposisi/{id}',[DisposisiController::class, 'inputDp']);
    Route::post('/save-disposisi',[DisposisiController::class, 'saveDp']);
    Route::get('/detail-disposisi',[DisposisiController::class, 'detailDp']);

    //arsip lembaran
    Route::get('/arsip-disposisi/{id}',[DisposisiController::class, 'arsipDp']);
});

//akses Kepala Tata Usaha
Route::group(['middleware' => ['auth', 'user-access:Ktu,Admin']], function () 
{
    //kelola surat masuk
    Route::get('/input-sm', [SuratMasukController::class, 'inputSm']);
    Route::post('/save-sm', [SuratMasukController::class, 'saveSm']);
    Route::get('/edit-sm/{id}', [SuratMasukController::class, 'editSm']);
    Route::post('/update-sm/{id}', [SuratMasukController::class, 'updateSm']);
    Route::get('/hapus-sm/{id}', [SuratMasukController::class, 'hapusSm']);
    Route::get('/hapus-fm/{id}', [SuratMasukController::class, 'hapusFm']);

    //kelola surat keluar
    Route::get('/input-sk', [SuratKeluarController::class, 'inputSk']);
    Route::post('/save-sk', [SuratKeluarController::class, 'saveSk']);
    Route::get('/edit-sk/{id}', [SuratKeluarController::class, 'editSk']);
    Route::post('/update-sk/{id}', [SuratKeluarController::class, 'updateSk']);
    Route::get('/hapus-sk/{id}', [SuratKeluarController::class, 'hapusSk']);
    Route::get('/hapus-fm/{id}', [SuratKeluarController::class, 'hapusFm']);
});