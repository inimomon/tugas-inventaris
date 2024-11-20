<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\RuangController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [RuangController::class, 'index'])->name('home');
Route::post('/home', [RuangController::class, 'store'])->name('ruang.store');
Route::put('/home/{id_ruang}', [RuangController::class, 'update'])->name('ruang.update');
Route::delete('/home/{id_ruang}', [RuangController::class, 'destroy'])->name('ruang.destroy');
// Route::resource('inventaris', InventarisController::class);