<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/create-user', [HomeController::class, 'create'])->name('create-user');
Route::post('/create-user', [HomeController::class, 'store'])->name('create-user');

Route::get('/update-user/{user}', [HomeController::class, 'show'])->name('update-user');
Route::put('/update-user/{user}', [HomeController::class, 'edit'])->name('update-user');

Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::get('/create-group', [GroupController::class, 'create'])->name('create-group');
Route::post('/create-group', [GroupController::class, 'store'])->name('create-group');

Route::get('/update-group/{group}', [GroupController::class, 'show'])->name('update-group');
Route::put('/update-group/{group}', [GroupController::class, 'edit'])->name('update-group');

