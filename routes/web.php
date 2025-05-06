<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'showLogin'])->name('login');
Route::post('/login', [PageController::class, 'submitLogin'])->name('submitLogin');

Route::get('/dashboard',[PageController::class, 'dashboard'])-> name('dashboard');

Route::get('/profile',[PageController::class, 'profile'])-> name('profile');
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

Route::get('/pengelolaan',[PageController::class, 'pengelolaan'])-> name('pengelolaan');
Route::delete('/pengelolaan/delete/{id}', [PageController::class, 'destroy'])->name('ticket.delete');
