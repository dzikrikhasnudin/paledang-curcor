<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Client\Index as Client;
use App\Livewire\Finance\Index as Finance;
use App\Livewire\Invoice\Index as Invoice;
use App\Livewire\Invoice\Create as CreateInvoice;
use App\Livewire\Invoice\Status as InvoiceStatus;
use App\Livewire\Invoice\Edit as InvoiceEdit;

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
    Route::get('tagihan/catat-meter', CreateInvoice::class)->name('tagihan.create');
    Route::get('tagihan/status-pembayaran/{id}', InvoiceStatus::class)->name('tagihan.status');
    Route::get('tagihan/edit/{id}', InvoiceEdit::class)->name('tagihan.edit');
});
