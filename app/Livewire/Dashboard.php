<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Title;

#[Title('Dashboard - Paledang Curcor')]
class Dashboard extends Component
{
    public $invoices;
    public $incomes;
    public $expenses;

    public function mount()
    {
        $this->invoices = Payment::where('status', 'unpaid')->latest()->take(5)->get();
        $this->incomes = Transaction::latest()->income()->take(6)->get();
        $this->expenses = Transaction::latest()->expense()->take(6)->get();
    }
    public function render()
    {
        // dd($this->invoices);
        return view('dashboard.index');
    }
}
