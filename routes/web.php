<?php


use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserActivityController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Todas las rutas aquí tendrán acceso para current_team_id = 1
    Route::resource('task_statuses', TaskStatusController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('users', UserController::class);
    Route::resource('user_activities', UserActivityController::class);

    
});


Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
    })->name('tasks');
