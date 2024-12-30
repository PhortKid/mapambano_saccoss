<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'opening_debit',
        'opening_credit',
        'monthly_debit',
        'monthly_credit',
        'total_debit',
        'total_credit',
    ];

    // Calculate total values dynamically
    public function calculateTotals()
    {
        $this->total_debit = $this->opening_debit + $this->monthly_debit;
        $this->total_credit = $this->opening_credit + $this->monthly_credit;
    }
}