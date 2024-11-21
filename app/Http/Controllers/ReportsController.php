<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ReportsController extends Controller
{
    public function shareReport()
{
    
    $users = User::with('shares')->get();  
    $title="All Shares Report Combined";
    return view('dash.reports.share_report', compact('users','title'));
}

public function savingsReport()
{
   
    $users = User::with('savings')->get(); 
    $title="All Saving  Report Combined"; 
    return view('dash.reports.savings_report', compact('users','title'));
}

public function depositReport()
{
   
    $users = User::with('deposite')->get(); 
    $title="All Deposit Report Combined";
    return view('dash.reports.deposite_report', compact('users','title'));
}


public function shareDateReport(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Fetch all users with their shares filtered by date range
    $users = User::with(['shares' => function ($query) use ($startDate, $endDate) {
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }])->get();
    $title="Shares Report from $startDate - $endDate";
    return view('dash.reports.share_date_report', compact('users', 'startDate', 'endDate','title'));
}


public function savingsDateReport(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Fetch all users with their savings filtered by date range
    $users = User::with(['savings' => function ($query) use ($startDate, $endDate) {
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }])->get();
    $title="Saving Report from $startDate - $endDate";
    return view('dash.reports.savings_date_report', compact('users', 'startDate', 'endDate','title'));
}



public function depositDateReport(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Fetch all users with their deposits filtered by date range
    $users = User::with(['deposite' => function ($query) use ($startDate, $endDate) {
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }])->get();
    $title="Deposit Report from $startDate - $endDate";

    return view('dash.reports.deposite_date_report', compact('users', 'startDate', 'endDate','title'));
}



}
