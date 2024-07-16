<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('pelanggan', \App\Livewire\Client\Index::class)->name('pelanggan.index');
    Route::get('keuangan', \App\Livewire\Transaction\Index::class)->name('keuangan.index');
    Route::get('tagihan', \App\Livewire\Invoice\Index::class)->name('tagihan.index');
    Route::get('tagihan/catat-meter', \App\Livewire\Invoice\Create::class)->name('tagihan.create');
    Route::get('tagihan/status-pembayaran/{id}', \App\Livewire\Invoice\Status::class)->name('tagihan.status');
    Route::get('tagihan/edit/{id}', \App\Livewire\Invoice\Edit::class)->name('tagihan.edit');
    Route::get('keuangan/tambah-transaksi', \App\Livewire\Transaction\Create::class)->name('keuangan.create');
    Route::get('keuangan/edit-transaksi/{id}', \App\Livewire\Transaction\Edit::class)->name('keuangan.edit');
});
