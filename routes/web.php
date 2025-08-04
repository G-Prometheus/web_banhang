<?php

use App\Http\Ajax\LocationController as AjaxLocationController;
use App\Http\Ajax\DashboardController as AjaxDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\UserController;

Route::get('/', function () {
    return view('welcome');
});

/* USER */

Route::group(['prefix' => 'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index') ->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
    Route::get('edit/{id}', [UserController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.edit')->middleware('admin');
    Route::post('update/{id}', [UserController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.update')->middleware('admin');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware('admin');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.destroy')->middleware('admin');

});
/* USER CATALOGUE*/
Route::group(['prefix' => 'user/catalogue'], function () {
    Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index') ->middleware('admin');
    Route::get('create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create')->middleware('admin');
    Route::post('store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store')->middleware('admin');
    Route::get('edit/{id}', [UserCatalogueController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit')->middleware('admin');
    Route::post('update/{id}', [UserCatalogueController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.catalogue.update')->middleware('admin');
    Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->name('user.catalogue.delete')->middleware('admin');
    Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.catalogue.destroy')->middleware('admin');

});
/* AJAX */
Route::get('ajax/location/getLocation', [AjaxLocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('admin');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus')->middleware('admin');

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index') ->middleware('admin');

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');