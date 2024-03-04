<?php


use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\RoleController;

use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

        Route::resource('task_statuses', TaskStatusController::class);
        Route::resource('tasks', TaskController::class);
        Route::resource('users', UserController::class);
        Route::resource('user_activities', UserActivityController::class);
        Route::resource('roles', RoleController::class);
        // Agrega esta ruta en tu archivo web.php
        Route::put('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
        // Route::put('/task_statuses/{taskStatus}', [TaskStatusController::class, 'update'])->name('task_statuses.update');



Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
})->name('tasks');
