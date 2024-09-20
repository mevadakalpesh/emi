<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/emi-details',[LoanController::class,'emiDetails'])->name('emi-details');
Route::get('/loan-details',[LoanController::class,'loadDetails'])->name('loan-details');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
