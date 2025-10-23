<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {return redirect()->route('login');});
Route::get('/login', [Controller::class, 'showLogin'])->name('login');
Route::post('/login', [Controller::class, 'login'])->name('login.tekan');
Route::post('/logout', [Controller::class, 'logout'])->name('logout');
Route::get('/dashboard', [Controller::class, 'showDashboard'])->name('dashboard');
Route::get('/profil', [Controller::class, 'showProfil'])->name('profil');
Route::get('/profil/edit', [Controller::class, 'formEditProfil'])->name('profil.formEdit');
Route::post('/profil/edit', [Controller::class, 'editProfil'])->name('profil.edit');
Route::get('/pengelolaan', [Controller::class, 'showPengelolaan'])->name('pengelolaan');
Route::get('/pengelolaan/tambah', [Controller::class, 'formTambahPupuk'])->name('pupuk.formTambah');
Route::post('/pengelolaan/tambah', [Controller::class, 'tambahPupuk'])->name('pupuk.tambah');
Route::delete('/pengelolaan/hapus/{id}', [Controller::class, 'hapusPupuk'])->name('pupuk.hapus');
Route::get('/pengelolaan/edit/{id}', [Controller::class, 'formEditPupuk'])->name('pupuk.formEdit');
Route::post('/pengelolaan/edit/{id}', [Controller::class, 'editPupuk'])->name('pupuk.edit');


