<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveRequestController;
use App\Models\Category;
use App\Models\ReserveRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/dashborard', [HomeController::class, 'role'])->name('home.role');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/requests', [DashboardController::class, 'events'])->name('requests');
    Route::patch('/accept/{event}', [DashboardController::class, 'accept'])->name('accept');
    Route::patch('/reject/{event}', [DashboardController::class, 'reject'])->name('reject');
    Route::post('/dashboard/acces', [DashboardController::class, 'acces'])->name('dashboard.acces');
    Route::resource('categories', CategoryController::class);
    Route::resource('events', EventController::class);
    Route::resource('reserve', ReserveRequestController::class);


});

require __DIR__.'/auth.php';
