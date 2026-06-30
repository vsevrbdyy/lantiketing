<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DTPController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============================================
// HOME
// ============================================
Route::get('/', function () {
    return view('dashboard');
})->name('home');

// ============================================
// AUTHENTICATION
// ============================================
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ============================================
// CONTACT
// ============================================
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'Contact'])->name('contact.submit');

// ============================================
// DESTINATION
// ============================================
Route::get('/destination', [DestinationController::class, 'showDestination'])->name('destination');
Route::get('/destinasi/{slug}', [DestinationController::class, 'show'])->name('destinasi.show');

// ============================================
// EXPERIENCE
// ============================================
Route::get('/experience', [ExperienceController::class, 'showExperience'])->name('experience');
Route::get('/experience/{slug}', [ExperienceController::class, 'show'])->name('experience.show');

// ============================================
// DAY TOUR PACKAGE
// ============================================
Route::get('/daytourpack', [DTPController::class, 'showDayTourPack'])->name('daytourpack');
Route::get('/daytourpack/{slug}', [DTPController::class, 'show'])->name('daytourpack.show');

// ============================================
// BOOKING
// ============================================
Route::get('/booking/{slug}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/success/{bookingCode}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/detail/{bookingCode}', [BookingController::class, 'show'])->name('booking.show');
Route::post('/booking/cancel/{bookingCode}', [BookingController::class, 'cancel'])->name('booking.cancel');
Route::post('/booking/paynow/{bookingCode}', [BookingController::class, 'payNow'])->name('booking.payNow');

// ============================================
// PAYMENT (Optional - Untuk halaman payment terpisah)
// ============================================
// Route::get('/booking/payment/{bookingCode}', [BookingController::class, 'payment'])->name('booking.payment');
// Route::post('/booking/payment/{bookingCode}', [BookingController::class, 'processPayment'])->name('booking.processPayment');

// ============================================
// APP (Mobile/Other)
// ============================================
Route::get('/app', [AppController::class, 'showApp'])->name('app');
Route::post('/app', [AppController::class, 'submitApp'])->name('app.submit');

// ============================================
// API (User)
// ============================================
Route::get('/api/user', function () {
    if (Auth::check()) {
        return response()->json(['user' => Auth::user()]);
    }
    return response()->json(['user' => null]);
});

// ============================================
// ADMIN LOGOUT
// ============================================
Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('filament.admin.auth.logout');