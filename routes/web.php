<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/creation-details/{id}', [HomeController::class, 'detail_creation'])->name('creation-details');
Route::get('/workshop-details/{id}', [HomeController::class, 'detail_workshop'])->name('workshop-details');

Route::get('/creation', [CreationController::class, 'index'])->name('creation');
Route::post('/creation/create', [CreationController::class, 'create'])->name('creation-create');
Route::get('/creation/{id}/edit', [CreationController::class, 'edit'])->name('creation-edit');
Route::post('/creation/{id}/update', [CreationController::class, 'update'])->name('creation-update');
Route::get('/creation/{karya}/delete', [CreationController::class, 'delete'])->name('creation-delete');

Route::get('/workshop', [WorkshopController::class,'index'])->name('workshop');
Route::post('/workshop/create', [WorkshopController::class, 'create'])->name('workshop-create');
Route::get('/workshop/{id}/edit', [WorkshopController::class, 'edit'])->name('workshop-edit');
Route::post('/workshop/{id}/update', [WorkshopController::class, 'update'])->name('workshop-update');
Route::get('/workshop/{workshop}/delete', [WorkshopController::class, 'delete'])->name('workshop-delete');

Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta');
Route::post('/peserta/create', [PesertaController::class, 'create'])->name('peserta-create');
Route::get('/peserta/{peserta}/delete', [PesertaController::class, 'delete'])->name('peserta-delete');
Route::get('/peserta/{id}/edit', [PesertaController::class,'edit'])->name('peserta-edit');
Route::post('/peserta/{id}/update', [PesertaController::class, 'update'])->name('peserta-update');

Route::get('/download/{name}', [HomeController::class,'getDownload'])->name('download_pdf');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_process', [AuthController::class, 'login_process'])->name('login_process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_process', [AuthController::class, 'register_process'])->name('register_process');

Route::group(['middleware' => 'auth'], function () {
    //admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
