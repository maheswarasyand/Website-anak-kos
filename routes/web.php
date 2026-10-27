<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/recipes', 'pages.recipes')->name('recipes.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('throttle:6,1');
});

Route::get('/', fn () => redirect()->route(auth()->check() ? 'dashboard' : 'login'));

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/budgets', 'pages.budgets')->name('budgets.index');
    Route::view('/expenses', 'pages.expenses')->name('expenses.index');
    Route::view('/tasks', 'pages.tasks')->name('tasks.index');
    Route::view('/schedules', 'pages.schedules')->name('schedules.index');
    Route::view('/reminders', 'pages.reminders')->name('reminders.index');
    Route::view('/shopping', 'pages.shopping-lists')->name('shopping.index');
    Route::view('/inventory', 'pages.inventory')->name('inventory.index');
    Route::view('/chat', 'pages.chat')->name('chat.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
