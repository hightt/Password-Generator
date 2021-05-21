<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\checkPswd;

// index.blade.php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [PasswordController::class, 'store'])->middleware('auth');

// auth
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// get.blade.php
Route::get('/get', [HomeController::class, 'get']);
Route::post('/generate', [PasswordController::class, 'generate'])->middleware('checkPswd');
Route::post('/saveToFile', [PasswordController::class, 'saveToFile']);

// passwords.blade.php
Route::get('/passwords', [PasswordController::class, 'show'])->middleware('auth');
Route::post('/update', [PasswordController::class, 'update']);
Route::get('/delete/{password}', [PasswordController::class, 'destroy']);


Route::get('/advices', [HomeController::class, 'advices']);
