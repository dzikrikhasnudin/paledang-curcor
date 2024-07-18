<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

#[Layout('layouts.app')]
#[Title('Data Tagihan - Paledang Curcor')]
class Index extends Component
{
    use WithPagination;


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
        if ($this->month) {
            $invoices = Payment::filter($this->month);
        } else {
            $invoices = Payment::latest();
        }

        if ($this->cari) {
            $invoices = Payment::whereHas('client', function (Builder $query) {
                $query->where('name', 'like', '%' . $this->cari . '%');
            });
        }

        return view('tagihan.index', [
            'invoices' => $invoices->paginate($this->paginate)
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
