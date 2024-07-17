<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::all();
    }

    public function map($client): array
    {
        return [
            //data yang dari kolom tabel database yang akan diambil
            $client->id,
            $client->name,
            $client->address,
            $client->current_meter,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Alamat',
            'Meteran Saat Ini',
        ];
    }
}
