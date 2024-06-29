<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;

class Dashboard extends Component
{
    public $invoices;

    public function mount()
    {
        $this->invoices = Payment::where('status', 'unpaid')->latest()->take(5)->get();
    }
    public function render()
    {
        // dd($this->invoices);
        return view('dashboard.index');
    }
}
