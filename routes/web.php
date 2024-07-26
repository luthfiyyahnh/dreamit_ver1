<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'editProfile'])->name('editProfile');
Route::post('/edit-profile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('editProfile.post');
