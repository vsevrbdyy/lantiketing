<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\DTPController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'Contact'])->name('contact.submit');

Route::get('/destination', [DestinationController::class, 'showDestination'])->name('destination');
Route::post('/destination', [DestinationController::class, 'submitDestination'])->name('destination.submit');

Route::get('/experience', [ExperienceController::class, 'showExperience'])->name('experience');
Route::post('/experience', [ExperienceController::class, 'submitExperience'])->name('experience.submit');

Route::get('/daytourpack', [DTPController::class, 'showDayTourPack'])->name('daytourpack');
Route::post('/daytourpack', [DTPController::class, 'submitDayTourPack'])->name('daytourpack.submit');

Route::get('/app', [AppController::class, 'showApp'])->name('app');
Route::post('/app', [AppController::class, 'submitApp'])->name('app');

Route::get('/api/user', function () {
    if (Auth::check()) {
        return response()->json(['user' => Auth::user()]);
    }
    return response()->json(['user' => null]);
});

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('filament.admin.auth.logout');