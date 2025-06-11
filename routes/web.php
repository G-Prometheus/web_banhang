<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;

Route::get('/', function () {
    return view('welcome');
});

/* USER */
Route::get('user/index', [UserController::class, 'index'])->name('user.index') ->middleware('auth');


Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('admin');
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index') ->middleware('auth');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');