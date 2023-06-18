<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SessionController;

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

Route::resource('dashboard/wisata', WisataController::class)->middleware('isLogin');

Route::get('/', [IndexController::class, 'index']);
Route::get('/wisata', [IndexController::class, 'listWisata']);
Route::get('/wisata/{id}', [IndexController::class, 'show']);

Route::get('/dashboard/login', [SessionController::class, 'index'])->middleware('isGuest');
Route::post('/dashboard/login', [SessionController::class, 'login'])->middleware('isGuest');
Route::get('/dashboard/logout', [SessionController::class, 'logout']);
