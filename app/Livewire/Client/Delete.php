<?php

namespace App\Livewire\Client;

use App\Models\Client;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public Client $client;

    public function render()
    {
        return view('pelanggan.delete');
    }

    public function delete()
    {
        $this->client->delete();

        session()->flash('message', 'Data pelanggan telah dihapus.');

        return redirect()->route('pelanggan.index');
    }
}
