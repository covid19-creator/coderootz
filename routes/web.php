<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('role_management', [MenuController::class, 'role_management'])->name('role_management');
    Route::get('user_management', [MenuController::class, 'user_management'])->name('user_management');
    Route::post('/update_user_role/{userId}', [MenuController::class, 'updateUserRole'])->name('update_user_role');
    Route::post('/add_role', [MenuController::class, 'addRole'])->name('add_role');
    Route::post('/update_role', [MenuController::class, 'updateRole'])->name('update_role');
    Route::delete('/delete_role/{id}', [MenuController::class, 'deleteRole'])->name('delete_role');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('customLogin', [AuthController::class, 'customLogin'])->name('customLogin'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('customRegistration', [AuthController::class, 'customRegistration'])->name('customRegistration'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');



