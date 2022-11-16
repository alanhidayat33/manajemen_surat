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

Route::group(['middleware' => ['auth', 'user-access:admin,maha,dekan,ktu']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/view-sm', [App\Http\Controllers\SuratMasukController::class, 'viewSm']);
});

/*
Route::middleware(['auth', 'user-access:admin,maha,dekan,ktu'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'user-access:dekan'])->group(function (){
    Route::get('/dekan/home', [App\Http\Controllers\HomeController::class, 'dekanHome'])->name('dekan.home');
});

Route::middleware(['auth', 'user-access:ktu'])->group(function (){
    Route::get('/ktu/home', [App\Http\Controllers\HomeController::class, 'ktuHome'])->name('ktu.home');
});

Route::middleware(['auth', 'user-access:kaur'])->group(function (){
    Route::get('/kaur/home', [App\Http\Controllers\HomeController::class, 'kaurHome'])->name('kaur.home');
});

Route::middleware(['auth', 'user-access:maha'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
*/