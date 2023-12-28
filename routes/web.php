<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('task_statuses', TaskStatusController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('users', UserController::class);

    // Rutas de perfil de usuario
    Route::put('/profile-information', [ProfileInformationController::class, 'update'])->name('profile-information.update');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])->name('two-factor.enable');
    
    // Ruta para redirigir automáticamente a /tasks después de iniciar sesión
    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->name('dashboard');
});
