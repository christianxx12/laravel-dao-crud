<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
  Route::get('/games', [GameController::class, 'index'])->name('games.index');
  Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
  Route::post('/games', [GameController::class, 'store'])->name('games.store');
  Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
  Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
  Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
});