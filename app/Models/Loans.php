<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loans extends Model
{
      // Hakikisha unajaza safu ambazo zinaruhusiwa kuingizwa
      protected $fillable = [
        'properties_number', 
        'issued', 
        'repaid', 
        'user_id'
    ];

   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

 
    public function getBalanceAttribute(): float
    {
        return $this->issued - $this->repaid;
    }
}
