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

    public $sortDirection = 'ASC';
    public $sortColumn = 'name';

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
                Client::orderBy($this->sortColumn, $this->sortDirection)->paginate($this->paginate) :
                Client::search($this->cari)
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->paginate($this->paginate)
        ]);
    }

    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }
}
