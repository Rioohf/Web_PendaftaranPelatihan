<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\PesertaPelatihanController;

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('level', \App\Http\Controllers\LevelController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('jurusan', \App\Http\Controllers\JurusanController::class);
Route::resource('gelombang', \App\Http\Controllers\GelombangController::class);
Route::post('/gelombang/update-status', [GelombangController::class, 'updateStatus'])->name('gelombang.updateStatus');

Route::get('pendaftaran', [\App\Http\Controllers\PesertaPelatihanController::class, 'create'])->name('pendaftaran.create');
Route::post('pendaftaran', [\App\Http\Controllers\PesertaPelatihanController::class, 'store'])->name('pendaftaran.store');
Route::get('finish', [\App\Http\Controllers\PesertaPelatihanController::class, 'finish'])->name('finish');
Route::resource('peserta', \App\Http\Controllers\PesertaPelatihanController::class);

