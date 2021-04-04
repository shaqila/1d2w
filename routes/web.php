<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\WorkshopController;
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

