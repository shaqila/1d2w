<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/creation-details/{id}', [HomeController::class, 'detail_creation'])->name('detail_creation');
Route::get('/workshop-details/{id}', [HomeController::class, 'detail_workshop'])->name('detail_workshop');
Route::get('/pendaftaran-details/{id}', [HomeController::class, 'detail_pendaftaran'])->name('detail-pendaftaran');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_process', [AuthController::class, 'login_process'])->name('login_process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_process', [AuthController::class, 'register_process'])->name('register_process');
Route::get('/download/{pdf}', [HomeController::class, 'getDownload'])->name('download_pdf');

// Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/complete-pendaftaran', [PendaftaranController::class, 'show'])->name('complete-pendaftaran');


Route::middleware(['auth'])->group(function () {

    Route::middleware(['peserta'])->group(function () {
        Route::get('/peserta/dashboard', [HomeController::class, 'peserta_dashboard'])->name('peserta-dashboard');
        Route::get('/peserta/setting', [HomeController::class, 'peserta_setting'])->name('peserta-setting');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->naet('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::prefix('workshop')->group(function () {
        Route::get('/', [WorkshopController::class, 'index'])->name('workshop');
        Route::post('/create', [WorkshopController::class, 'create'])->name('workshop-create');
        Route::get('/{id}/edit', [WorkshopController::class, 'edit'])->name('workshop-edit');
        Route::post('/{id}/update', [WorkshopController::class, 'update'])->name('workshop-update');
        Route::get('/{workshop}/delete', [WorkshopController::class, 'delete'])->name('workshop-delete');
        Route::get('/{id}/detail', [WorkshopController::class, 'workshop_detail'])->name('workshop-detail');
    });
    Route::prefix('creation')->group(function () {
        Route::get('/', [CreationController::class, 'index'])->name('creation');
        Route::post('/create', [CreationController::class, 'create'])->name('creation-create');
        Route::get('/{id}/edit', [CreationController::class, 'edit'])->name('creation-edit');
        Route::post('/{id}/update', [CreationController::class, 'update'])->name('creation-update');
        Route::get('/{karya}/delete', [CreationController::class, 'delete'])->name('creation-delete');
    });
    Route::prefix('peserta')->group(function () {
        Route::get('/', [PesertaController::class, 'index'])->name('peserta');
        Route::post('/create', [PesertaController::class, 'create'])->name('peserta-create');
        Route::get('/{peserta}/delete', [PesertaController::class, 'delete'])->name('peserta-delete');
        Route::get('/{id}/edit', [PesertaController::class, 'edit'])->name('peserta-edit');
        Route::post('/{id}/update', [PesertaController::class, 'update'])->name('peserta-update');
    });
});
