<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ClientExport;
use App\Exports\InvoiceExport;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function client()
    {
        return Excel::download(new ClientExport, 'clients.xlsx');
    }

    public function invoices(Request $request)
    {
        return Excel::download(new InvoiceExport($request->month), 'Data Tagihan Bulan ' .  $request->month . ' - Paledang Curcor.xlsx');
    }


    public function transactions(Request $request)
    {
        return Excel::download(new TransactionExport($request->month), 'Data Transaksi - Paledang Curcor.xlsx');
    }
}
