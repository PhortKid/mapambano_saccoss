<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'loan_term',
    ];

    
    protected $table='loan_applicant';

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
