<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveRequestController;
use App\Http\Controllers\TicketController;
use App\Models\Category;
use App\Models\ReserveRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('onepage/{event}', [HomeController::class, 'more'])->name('more');
Route::get('/search', [HomeController::class, 'search'])->name('events.search');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('events.category');


// });

Route::middleware('auth', 'checkRole:admin')->group(function () {
    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/requests', [DashboardController::class, 'events'])->name('requests');
    Route::patch('/accept/{event}', [DashboardController::class, 'accept'])->name('accept');
    Route::patch('/reject/{event}', [DashboardController::class, 'reject'])->name('reject');
    Route::post('/dashboard/acces', [DashboardController::class, 'acces'])->name('dashboard.acces');
    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth', 'checkRole:organizer')->group(function () {
    Route::patch('/reserveAccept/{reserve}', [ReserveRequestController::class, 'accept'])->name('reserveAccept');
    Route::patch('/reserveReject/{reserve}', [ReserveRequestController::class, 'reject'])->name('reserveReject');
    Route::resource('reserve', ReserveRequestController::class);
    Route::resource('events', EventController::class);
});
Route::middleware('auth', 'checkRole:admin,organizer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});



Route::middleware('auth')->group(function () {
    Route::post('/reserve', [ReserveRequestController::class, 'store'])->name('reserve.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/dashborard', [HomeController::class, 'role'])->name('home.role');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('ticket', TicketController::class);
});

require __DIR__ . '/auth.php';
