<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the shares for the user.
     */
    public function shares(): HasMany
    {
        return $this->hasMany(Shares::class);
    }

    public function savings(): HasMany
    {
        return $this->hasMany(Savings::class);
    }


    public function deposite(): HasMany
    {
        return $this->hasMany(Deposite::class);
    }

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }

    public function interest()
    {
        return $this->hasMany(Interest::class);
    }

    
    public function loanApplications()
    {
        return $this->hasMany(LoanApplication::class, 'client_id');
    }
    
    public function approvedLoanApplications()
    {
        return $this->hasMany(LoanApplication::class, 'approved_by');
    }
    
}
