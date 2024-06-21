<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/menu', [CategoryController::class, 'list'])->name('menu');
Route::get('/menu/crear-orden', [OrderController::class, 'create_nl'])->name('create-order-nl');
Route::post('/menu/crear-orden', [OrderController::class, 'store_nl'])->name('store-order-nl');

Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');
Route::resource('/dashboard/orders', OrderController::class)->middleware('auth');
Route::put('/dashboard/orders', [OrderController::class, 'updateState'])->name('orders.update.state')->middleware('auth');
Route::resource('/dashboard/tables', TableController::class)->middleware('auth');
Route::resource('/dashboard/dishes', DishController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
