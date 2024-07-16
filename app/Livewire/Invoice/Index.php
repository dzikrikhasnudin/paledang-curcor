<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.app')]

    public $paginate = 8;
    public $month;
    public $cari;

    protected $queryString = ['bulan', 'cari'];

    public function mount()
    {
        $this->cari = request()->query('cari', $this->cari);
        $this->month = request()->query('bulan', $this->month);
    }
    public function render()
    {
        // dd(Payment::where('client_id', 10)->get());

        return view('tagihan.index', [
            'invoices' => $this->month == null ?
                Payment::latest()->paginate($this->paginate) :
                Payment::filter($this->month)->paginate($this->paginate)
            // Payment::where('cari', 'like', '%' . $this->cari . '%')->paginate($this->paginate)
        ]);
    }

    public function destroy($id)
    {
        $invoice = Payment::find($id);

        if (Storage::exists('public', $invoice->image)) {
            Storage::delete('public/' . $invoice->image);
        }

        $invoice->delete();
    }
}
