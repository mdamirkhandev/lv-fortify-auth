<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->middleware('auth', 'verified')->name('home');
Route::view('/profile/edit', 'profile.edit')->middleware('auth');
Route::view('/profile/password', 'profile.password')->middleware('auth');
Route::view('/profile', 'profile.profile')->middleware('auth')->name('profile');
