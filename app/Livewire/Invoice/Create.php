<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use App\Models\Payment;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Tagihan - Paledang Curcor')]
class Create extends Component
{
    use WithFileUploads;

    public $clientId;
    public $price = 2000;
    public $month = null;
    public $meter;
    public $image;

    private function clientWithoutPaymentInMonth($month)
    {
        $clientWithoutPayment = [];
        $clients = Client::all();

        foreach ($clients as $client) {
            $payments = Payment::where('client_id', $client->id)->where('month', $month)->get();

            if ($payments->isEmpty()) {
                $clientWithoutPayment[] = $client;
            }
        }

        return $clientWithoutPayment;
    }


    public function render()
    {
        $clients = collect($this->clientWithoutPaymentInMonth($this->month))->sortBy('name');

        return view('tagihan.create', compact('clients'));
    }

    public function save()
    {
        $previousMonth = Payment::where('client_id', $this->clientId)->latest()->first();

        $client = Client::find($this->clientId);
        if ($previousMonth == null) {
            $previousMeter = $client->start_meter;
        } else {
            $previousMeter = $previousMonth->total_meter;
        }

        $usage = $this->meter - $previousMeter;

        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();

            $filePath = 'Meteran-' . date('Y') . '/' . $this->month;
            $fileName = str_replace(' ', '-', $client->name) . '-' . str_replace(' ', '-', $client->address) . '.' . $extension;

            $imagePath = $this->image->storeAs($filePath, $fileName, 'public');
        } else {
            $imagePath = null;
        };

        $payment = Payment::create([
            'client_id' => $this->clientId,
            'month' => $this->month,
            'total_meter' => $this->meter,
            'usage' => $usage,
            'amount' => $usage * $this->price,
            'image' => $imagePath
        ]);

        $client->update([
            'current_meter' => $this->meter
        ]);

        return redirect()->route('tagihan.status', $payment->id);
    }
}
