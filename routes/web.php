<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarBeasiswaController;

# menampilkan halaman zero page
Route::get('/', [DaftarBeasiswaController::class, 'index']);

# menampilkan halaman cek nim dengan format json
Route::get('cekipk/{nim}', [DaftarBeasiswaController::class, 'cek_ipk']);

# menampilkan halaman daftar beasiswa
Route::get('daftar', [DaftarBeasiswaController::class, 'daftar_view']);
Route::post('daftar', [DaftarBeasiswaController::class, 'daftar']);

# menampilkan halaman hasil
Route::get('hasil', [DaftarBeasiswaController::class, 'hasil']);
