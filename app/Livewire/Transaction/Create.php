<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class Create extends Component
{
    use WithFileUploads;

    public $category = 'Pengeluaran';
    public $description;
    public $image;
    public $amount;
    public $date;

    protected $listeners = ['dateSelected' => 'updateDate'];

    public function render()
    {
        return view('keuangan.create');
    }

    public function save()
    {

        // dd($this->category, $this->description, $this->amount, $this->date, $this->image->getClientOriginalName());

        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();

            $filePath = 'Transaksi';
            $fileName = time()  . '-' .  $this->image->getClientOriginalName();

            $imagePath = $this->image->storeAs($filePath, $fileName, 'public');
        } else {
            $imagePath = null;
        };

        Transaction::create([
            'date' => $this->date,
            'description' => $this->description,
            'category' => $this->category,
            'amount' => $this->amount,
            'image' => $imagePath
        ]);

        return redirect()->route('keuangan.index');
    }

    public function updateDate($date)
    {
        $tanggal = Carbon::parse($date);
        $this->date = $tanggal->timezone('Asia/Jakarta')->format('Y-m-d');
        // $this->date = $date;
    }
}
