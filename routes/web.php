<?php

use App\Livewire\Auth\Login;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Donation\Index as DonationIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 1. Publik / Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Autentikasi
Route::get('/login', Login::class)->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// 3. Area Admin (Protected)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/donations', DonationIndex::class)->name('admin.donations.index'); 
});