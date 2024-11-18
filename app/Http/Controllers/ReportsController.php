<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ReportsController extends Controller
{
    public function shareReport()
{
    // Fetch all users with their associated share transactions
    $users = User::with('shares')->get();  // Assuming you have a share relationship on the User model
    return view('dash.reports.share_report', compact('users'));
}

public function savingsReport()
{
    // Fetch all users with their associated saving transactions
    $users = User::with('savings')->get();  // Assuming you have a saving relationship on the User model
    return view('dash.reports.savings_report', compact('users'));
}

public function depositReport()
{
    // Fetch all users with their associated deposit transactions
    $users = User::with('deposite')->get();  // Assuming you have a deposit relationship on the User model
    return view('dash.reports.deposite_report', compact('users'));
}



}
