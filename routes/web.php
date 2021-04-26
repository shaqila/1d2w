<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/creation-details/{id}', [HomeController::class, 'detail_creation'])->name('detail_creation');
Route::get('/workshop-details/{id}', [HomeController::class, 'detail_workshop'])->name('detail_workshop');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/tips', [HomeController::class, 'tips'])->name('tips');

Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/login_process', [AuthController::class, 'login_process'])->name('login_process');
Route::get('/signup', [AuthController::class, 'register'])->name('signup');
Route::post('/register_process', [AuthController::class, 'register_process'])->name('register_process');
Route::get('/download/{pdf}', [HomeController::class, 'getDownload'])->name('download_pdf');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => 'auth'], function () {
    Auth::routes(['verify' => true]);
    Route::middleware(['peserta', 'verified'])->group(function () {
        Route::get('/peserta/dashboard', [PesertaController::class, 'peserta_dashboard'])->name('peserta-dashboard');
        Route::post('/peserta/naskah', [PesertaController::class, 'naskah_peserta'])->name('naskah_peserta');
        // Pendaftaran
        Route::get('/pendaftaran-details/{id}', [PendaftaranController::class, 'index'])->name('detail-pendaftaran');
        Route::post('/daftar-workshop', [PendaftaranController::class, 'create_proses'])->name('create_pendaftaran');
        Route::get('/complete-pendaftaran', [PendaftaranController::class, 'show'])->name('complete-pendaftaran');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::prefix('workshop')->group(function () {
            Route::get('/', [WorkshopController::class, 'index'])->name('workshop');
            Route::post('/create', [WorkshopController::class, 'create'])->name('workshop-create');
            Route::get('/{id}/edit', [WorkshopController::class, 'edit'])->name('workshop-edit');
            Route::post('/update/{id}', [WorkshopController::class, 'update'])->name('workshop-update');
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
        Route::get('feedback/{peserta}', [PesertaController::class, 'feedback_peserta'])->name('feedback-peserta');
        Route::post('feedback/{peserta}/update', [PesertaController::class, 'feedback_update'])->name('feedback-update');
        Route::get('pembayaran/{id}', [PendaftaranController::class, 'pembayaran'])->name('pembayaran');
        
        Route::prefix('peserta')->group(function () {
            Route::get('/', [PesertaController::class, 'index'])->name('peserta');
            Route::post('/create', [PesertaController::class, 'create'])->name('peserta-create');
            Route::get('/{peserta}/delete', [PesertaController::class, 'delete'])->name('peserta-delete');
            Route::get('/{id}/edit', [PesertaController::class, 'edit'])->name('peserta-edit');
            Route::post('/{id}/update', [PesertaController::class, 'update'])->name('peserta-update');
            Route::get('/download/{naskah}', [PesertaController::class, 'getDownload'])->name('download_naskah');
            
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
