<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DaftarAkunController;
use App\Http\Controllers\EmergencyPasswordController;
use App\Http\Controllers\hapusAkunUserController;
use App\Http\Controllers\SuperProgramsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = Auth::user()->level;
    return view('dashboard', ['role' => $role]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return 'Admin Dashboard';
    });
    Route::get('/superPrograms/emergencyPassword', [EmergencyPasswordController::class, 'index'])->name('gantiEmergencyPassword');
    Route::post('/superPrograms/emergencyPassword', [EmergencyPasswordController::class, 'ganti']);
    
    // daftar akun baru melalui admin
    Route::get('/dashboard/daftar', [DaftarAkunController::class, 'create'])->name('profile.daftar');
    Route::post('/dashboard/daftar', [DaftarAkunController::class, 'storeByAdmin']);
    
    // hapus akun melalui the engineer
    Route::get('/superPrograms/hapusAkunUser', [hapusAkunUserController::class, 'index'])->name('hapusAkunUser');
    Route::post('/superPrograms/hapusAkunUser', [hapusAkunUserController::class, 'hapusAkun']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// menggunakan level
Route::middleware(['auth', RoleMiddleware::class])->group(function () {

    // admin
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        
    });

    // kasir
    Route::middleware([RoleMiddleware::class . ':kasir'])->group(function () {
        
    });

    // bendahara
    Route::middleware([RoleMiddleware::class . ':bendahara'])->group(function () {
        Route::get('/bendahara', function () {
            return 'Bendahara Dashboard';
        });
    });
});


require __DIR__ . '/auth.php';
