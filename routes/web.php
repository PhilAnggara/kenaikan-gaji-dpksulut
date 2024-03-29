<?php

use App\Http\Controllers\KenaikanGajiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::resource('informasi-pribadi', PersonalInformationController::class);
    Route::resource('kelola-pengguna', UserController::class)->middleware('checkRole:Kepala Dinas');
    Route::post('change-password', [PersonalInformationController::class, 'changePassword'])->name('change.password');
    Route::get('pendaftaran-kenaikan-gaji', [MainController::class, 'pendaftaran'])->middleware('checkRole:ASN Pemohon')->name('pendaftaran');
    Route::post('pendaftaran-kenaikan-gaji', [MainController::class, 'kirimPendaftaran'])->middleware('checkRole:ASN Pemohon')->name('kirim-pendaftaran');
    Route::resource('permohonan-kenaikan-gaji', KenaikanGajiController::class)->middleware('checkRole:Kepala Dinas,Sub Bagian Kepegawaian,Dinas Daerah');
    Route::put('buat-permohonan-baru/{id}', [MainController::class, 'permohonanBaru'])->name('permohonan.baru');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
