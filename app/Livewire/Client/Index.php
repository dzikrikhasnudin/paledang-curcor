<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class Index extends Component
{
    use WithPagination;


    public $cari;
    public $paginate = 8;

    protected $queryString = ['cari'];

    public function mount()
    {
        $this->cari = request()->query('cari', $this->cari);
    }

    public function render()
    {
        // $clients = Client::latest();
        return view('pelanggan.index', [
            'clients' => $this->cari == null ?
                Client::latest()->paginate($this->paginate) :
                Client::where('name', 'like', '%' . $this->cari . '%')
                ->orWhere('address', 'like', '%' . $this->cari . '%')->paginate($this->paginate)
        ]);
    }
}
