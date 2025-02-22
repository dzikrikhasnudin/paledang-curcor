<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;

class BulkDelete extends ModalComponent
{
    public $month;

    public function render()
    {
        return view('keuangan.bulk-delete');
    }

    public function delete()
    {
        $transactions = Transaction::oldest('date')->whereMonth('date', $this->month)->get();

        if ($transactions->count() == 0) {
            return $this->addError('month', 'Tidak ada ada yang dipilih');
        }

        // dd($transactions->count() == 0);


        foreach ($transactions as $transaction) {

            if (Storage::exists('public', $transaction->image)) {
                Storage::delete('public/' . $transaction->image);
            }

            $transaction->delete();
        }

        session()->flash('message', 'Data transaksi telah dihapus');
        return redirect()->route('keuangan.index');
    }
}
