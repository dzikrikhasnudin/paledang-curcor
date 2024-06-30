<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'date' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'transactions';
    protected $fillable = [
        'date', 'description', 'amount', 'category', 'image'
    ];

    public function scopeIncome($query)
    {
        $query->where('category', 'Pendapatan');
    }

    public function scopeExpense($query)
    {
        $query->where('category', 'Pengeluaran');
    }
}
