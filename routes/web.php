<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Client\Index as Client;
use App\Livewire\Finance\Index as Finance;
use App\Livewire\Invoice\Index as Invoice;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('pelanggan', Client::class)->name('pelanggan.index');
    Route::get('keuangan', Finance::class)->name('keuangan.index');
    Route::get('tagihan', Invoice::class)->name('tagihan.index');
});
