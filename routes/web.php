<?php

use App\Livewire\Auth\Login;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Donation\Index as DonationIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ---------------------------------------------------------
// 1. Publik / Landing Page
// ---------------------------------------------------------
// Saat ini diarahkan ke view kontak sesuai permintaan Anda
Route::get('/', function () {
    return view('kontak');
})->name('home');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// ---------------------------------------------------------
// 2. Autentikasi
// ---------------------------------------------------------
Route::get('/login', Login::class)->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ---------------------------------------------------------
// 3. Area Admin (Protected)
// ---------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    
    // CRUD Donasi sudah lengkap di sini
    Route::get('/admin/donations', DonationIndex::class)->name('admin.donations.index'); 
});