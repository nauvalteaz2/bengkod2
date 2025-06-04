<?php

use App\Http\Controllers\Dokter\JadwalPeriksaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');

    Route::prefix('jadwal-periksa')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::get('/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::get('/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal-periksa.edit');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
        Route::delete('/{id}', [JadwalPeriksaController::class, 'destroy'])->name('dokter.jadwal-periksa.destroy');
    });
});
