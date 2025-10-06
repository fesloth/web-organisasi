<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');

    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::put('/program/{program}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');

    Route::get('/event', [EventController::class, 'index'])->name('event');

    Route::get('/forum', [ForumController::class, 'index'])->name('forum');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{forum}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{forum}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{forum}', [ForumController::class, 'destroy'])->name('forum.destroy');
});
