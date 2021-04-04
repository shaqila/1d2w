<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminController;
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
Route::get('/creation', [CreationController::class, 'index'])->name('creation');   
Route::get('/creation-details', [CreationController::class, 'readon'])->name('creation-details'); 
Route::get('/workshop-details', [WorkshopController::class, 'readon'])->name('workshop-details');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
Route::get('/workshop', [WorkshopController::class,'index'])->name('workshop');
Route::post('/workshop/create', [WorkshopController::class, 'create'])->name('workshop-create');
Route::get('/workshop/{workshop}/details', [WorkshopController::class, 'readon'])->name('workshop-readon');

