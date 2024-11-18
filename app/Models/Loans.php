<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loans extends Model
{
      
    protected $fillable = [
        'balance',
       'amount',
        'user_id'
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
}
