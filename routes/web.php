<?php

use App\Http\Ajax\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;

Route::get('/', function () {
    return view('welcome');
});

/* USER */
Route::get('user/index', [UserController::class, 'index'])->name('user.index') ->middleware('admin');
Route::group(['prefix' => 'user'], function () {
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
    // Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('admin');
    // Route::post('update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('admin');
    // Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware('admin');
});
/* AJAX */
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('admin');

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index') ->middleware('admin');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');