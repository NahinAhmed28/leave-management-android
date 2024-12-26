<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::resource('leaves', LeaveController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
