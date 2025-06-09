<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OffWorkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/loginaction', [AuthController::class, 'loginAction'])->name('login-action');
Route::patch('/reset-password/{id}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('/logout', [AuthController::class, 'logoutAction'])->name('logout-action');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/offwork', [OffWorkController::class, 'index'])->name('offwork');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/account-profile', [ProfileController::class, 'index'])->name('account');
});

Route::post('/add-employee', [EmployeeController::class, 'store'])->name('add-employee');
Route::get('/get-detail-employee', [EmployeeController::class, 'getOneData'])->name('get-one-employee');
Route::patch('/update-employee/{id}', [EmployeeController::class, 'update'])->name('update-employee');
Route::delete('/delete-employee/{id}', [EmployeeController::class, 'destroy'])->name('delete-employee');

Route::post('/add-user', [UserController::class, 'store'])->name('add-user');
Route::get('/get-detail-user', [UserController::class, 'getOneData'])->name('get-one-user');
Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

Route::post('/add-offwork', [OffWorkController::class, 'store'])->name('add-offwork');
Route::get('/get-detail-offwork', [OffWorkController::class, 'getOneData'])->name('get-one-offwork');
Route::patch('/update-offwork/{id}', [OffWorkController::class, 'update'])->name('update-offwork');
Route::delete('/delete-offwork/{id}', [OffWorkController::class, 'destroy'])->name('delete-offwork');

Route::patch('/update-user-profile/{id}', [ProfileController::class, 'update'])->name('update-user-profile');