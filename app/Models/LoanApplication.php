<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





    class LoanApplication extends Model


    {

        protected $table="loan_application";
        protected $fillable = ['client_id', 'amount', 'description', 'loan_term', 'is_approved', 'approved_by'];
    
        public function client()
        {
            return $this->belongsTo(User::class, 'client_id');
        }
    
        public function approver()
        {
            return $this->belongsTo(User::class, 'approved_by');
        }
    }
    

