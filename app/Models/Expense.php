<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table ='expense';
    protected $fillable = [
        'expense_description', 
        'credit', 
        'debit'
    ];

    
    public function getBalanceAttribute(): float
    {
        return $this->debit - $this->credit;
    }
}
