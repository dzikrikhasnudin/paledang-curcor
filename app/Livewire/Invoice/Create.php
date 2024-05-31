<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $clientId;
    public $month;
    public $meter;
    public $image;
    public $client;


    public function render()
    {
        $clients = Client::all()->sortBy('name');
        return view('tagihan.create', compact('clients'));
    }

    public function save()
    {
        $this->client = Client::find($this->clientId);


        // dd($this->amount($this->meter));


        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();

            $filePath = 'Meteran-' . date('Y') . '/' . $this->month;
            $fileName = str_replace(' ', '-', $this->client->name) . '-' . str_replace(' ', '-', $this->client->address) . '.' . $extension;

            $imagePath = $this->image->storeAs($filePath, $fileName, 'public');
        } else {
            $imagePath = null;
        };


        Payment::create([
            'client_id' => $this->clientId,
            'month' => $this->month,
            'meter' => $this->meter,
            'amount' => $this->amount($this->meter),
            'image' => $imagePath
        ]);

        return redirect()->route('tagihan.index');
    }

    public function amount($meter)
    {
        $price = 2000;
        $usage = $meter - $this->client->current_meter;

        $amount = $usage * $price;

        return $amount;
    }
}
