<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('task', TaskController::class);
Route::get('/main', [TaskController::class, 'main'])->name('main');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update'); 
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

require __DIR__.'/auth.php';
