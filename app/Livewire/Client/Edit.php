<?php

namespace App\Livewire\Client;


use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public Client $client;

    public $name;
    public $address;
    public $start_meter;


    public function render()
    {
        dd($this->client);
        return view('pelanggan.edit');
    }
}
