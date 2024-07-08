<?php

use Illuminate\Support\Facades\Route;
// use App\Livewire\Client\Index as Client;
// use App\Livewire\Transaction\Index as Transaction;
// use App\Livewire\Invoice\Index as Invoice;
use App\Livewire\Invoice\Create as CreateInvoice;
use App\Livewire\Invoice\Status as InvoiceStatus;
use App\Livewire\Invoice\Edit as InvoiceEdit;
use App\Livewire\Dashboard;
use App\Livewire\Transaction\Create as CreateTransaction;

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
    Route::get('tagihan/catat-meter', CreateInvoice::class)->name('tagihan.create');
    Route::get('tagihan/status-pembayaran/{id}', InvoiceStatus::class)->name('tagihan.status');
    Route::get('tagihan/edit/{id}', InvoiceEdit::class)->name('tagihan.edit');
    Route::get('keuangan/tambah-transaksi', CreateTransaction::class)->name('keuangan.create');
});
