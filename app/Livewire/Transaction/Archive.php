<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
#[Title('Data Transaksi - Paledang Curcor')]
class Archive extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $incomes;
    public $expenses;
    public $balance;
    public $cari;
    public $month;
    public $year;

    protected $queryString = ['year'];

    public function mount()
    {
        $this->month = request()->query('bulan', $this->month);
    }

    public function render()
    {

        $this->updateBalances();

        if ($this->month != null) {
            $transactions = Transaction::latest('date')->whereMonth('date', $this->month)->whereYear('date', $this->year)->paginate($this->paginate);
        } else {
            $transactions = Transaction::latest('date')->whereYear('date', $this->year)->paginate($this->paginate);
        }

        return view('keuangan.index', compact('transactions'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (Storage::exists('public', $transaction->image)) {
            Storage::delete('public/' . $transaction->image);
        }

        $transaction->delete();
        $this->dispatch('transaction-deleted', $transaction);
    }

    #[On('transaction-deleted')]
    public function updateBalances()
    {
        $currentYear = $this->year;

        if ($this->month != null) {
            $this->incomes = Transaction::income()->whereMonth('date', $this->month)->whereYear('date', $currentYear)->get();
            $this->expenses = Transaction::expense()->whereMonth('date', $this->month)->whereYear('date', $currentYear)->get();
            $this->balance = $this->incomes->sum('amount') - $this->expenses->sum('amount');
        } else {
            $this->incomes = Transaction::income()->whereYear('date', $currentYear)->get();
            $this->expenses = Transaction::expense()->whereYear('date', $currentYear)->get();
            $this->balance = $this->incomes->sum('amount') - $this->expenses->sum('amount');
        }
    }
}
