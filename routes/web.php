<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('home');

Route::get('login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('logout', function () {
    Auth::logout();
    Session::flush();
    return redirect()->route('login');
})->middleware('auth')->name('logout');

Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'googleRedirect'])
    ->name('google.login');
Route::get('/callback/google', [App\Http\Controllers\Auth\GoogleController::class, 'googleCallback'])
    ->name('google.callback');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
    Route::get('/user/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.profile');
    Route::resource('/rooms', \App\Http\Controllers\Admin\RoomController::class);
    Route::resource('/rooms/{room}/seats', \App\Http\Controllers\Admin\SeatController::class)->except('index');
});
