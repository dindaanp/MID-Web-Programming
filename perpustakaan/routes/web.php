<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\PeminjamanController; 
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

// Rute Otentikasi
Auth::routes();

// Rute Resource untuk CRUD
Route::resource('anggota', AnggotaController::class);
Route::resource('buku', BukuController::class);
Route::resource('kategori', KategoriController::class);

// Rute Home
Route::get('/', function () {
    return view('welcome');
});

// Rute Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Rute untuk Peminjaman Buku
Route::get('/pinjam', [PeminjamanController::class, 'create'])->name('borrow.books');
Route::post('/pinjam', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// Rute untuk riwayat peminjaman
Route::get('/peminjaman/history', [PeminjamanController::class, 'history'])->middleware('auth')->name('peminjaman.history');

// Rute untuk wishlist buku
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth')->name('wishlist.books');

// Rute Tambahan yang Memerlukan Otentikasi
Route::middleware('auth')->group(function () {
    Route::get('/register-member', [AnggotaController::class, 'create'])->name('register.member');
    Route::get('/search-books', [BukuController::class, 'search'])->name('search.books');
    Route::get('/return-books', [BukuController::class, 'return'])->name('return.books');
    Route::get('/manage-categories', [KategoriController::class, 'index'])->name('manage.categories');
    Route::get('/popular-books', [BukuController::class, 'popular'])->name('popular.books');
    Route::get('/book-reviews', [BukuController::class, 'reviews'])->name('book.reviews');

    // Rute Peminjaman
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');

    // rute dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rute untuk Ulasan Buku
    Route::get('/buku/{id}/reviews', [BukuController::class, 'reviews'])->name('buku.reviews');
    Route::get('buku/{buku_id}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('buku/{buku_id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::post('/buku/return', [BukuController::class, 'submitReturn'])->name('buku.return.submit');
});