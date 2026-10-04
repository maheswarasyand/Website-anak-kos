<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$dashboard = function () {
    if (Auth::check()) {
        return app(DashboardController::class)->index();
    }

    return view('dashboard', [
        'currentBudget' => null,
        'totalSpent' => 0,
        'remainingBudget' => 0,
        'pendingTasks' => 0,
        'todaySchedules' => collect(),
        'lowStockItems' => collect(),
        'upcomingReminders' => collect(),
    ]);
};

Route::get('/', $dashboard);
Route::get('/dashboard', $dashboard)->name('dashboard');

Route::view('/budgets', 'pages.budgets')->name('budgets.index');
Route::view('/expenses', 'pages.expenses')->name('expenses.index');
Route::view('/tasks', 'pages.tasks')->name('tasks.index');
Route::view('/schedules', 'pages.schedules')->name('schedules.index');
Route::view('/reminders', 'pages.reminders')->name('reminders.index');
Route::view('/recipes', 'pages.recipes')->name('recipes.index');
Route::view('/shopping', 'pages.shopping-lists')->name('shopping.index');
Route::view('/inventory', 'pages.inventory')->name('inventory.index');
Route::view('/chat', 'pages.chat')->name('chat.index');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('dashboard');
})->name('logout');
