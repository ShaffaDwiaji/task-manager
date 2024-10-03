<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('main');
})->name('main');
Route::resource('tasks', TaskController::class);
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::get('/tasks/show/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update'); 
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::redirect('/home', '/dashboard')->name('home');

Route::get('/test-404', function() {
    abort(404);
});