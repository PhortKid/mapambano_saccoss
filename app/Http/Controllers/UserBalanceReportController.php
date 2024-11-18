<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserBalanceReportController extends Controller
{
    public function index()
    {
        // Get all users with their balance data from related tables
        $users = User::with(['deposite', 'shares', 'savings', 'loans'])->get();

        // Initialize total balance variables
        $totalDepositBalance = 0;
        $totalShareBalance = 0;
        $totalSavingBalance = 0;
        $totalLoanBalance = 0;

        // Loop through each user and calculate total balances
        foreach ($users as $user) {
            $totalDepositBalance += $user->deposite->sum('balance');
            $totalShareBalance += $user->shares->sum('balance');
            $totalSavingBalance += $user->savings->sum('balance');
            $totalLoanBalance += $user->loans->sum('balance');
        }

        // Pass data to the view
        return view('dash.users_report.users_balance_report', compact(
            'users',
            'totalDepositBalance',
            'totalShareBalance',
            'totalSavingBalance',
            'totalLoanBalance'
        ));
    }

}
