<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('customLogin', [AuthController::class, 'customLogin'])->name('customLogin'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('customRegistration', [AuthController::class, 'customRegistration'])->name('customRegistration'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('role_management', [MenuController::class, 'role_management'])->name('role_management');
Route::get('user_management', [MenuController::class, 'user_management'])->name('user_management');


