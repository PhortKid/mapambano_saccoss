<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Deposite extends Model
{

    protected $table ='deposite';
    protected $fillable = [
        'paid_in', 
        'withdraw', 
        'user_id'
    ];

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

 
    public function getBalanceAttribute(): float
    {
        return $this->paid_in - $this->withdraw;
    }
}
