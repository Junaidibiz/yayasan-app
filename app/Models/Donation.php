<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan input data
    protected $fillable = [
        'user_id',
        'invoice_number',
        'amount',
        'payment_method',
        'status',
        'note',
        'confirmed_at'
    ];

    /**
     * Relasi ke User (Donatur)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}