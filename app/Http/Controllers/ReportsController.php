<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shares;
class ReportsController extends Controller
{
    public function shareReport()
{
    if(Auth::user()->role =="Applicant"){
          
        $users = User::with(['shares' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->where('id', Auth::id())->get();  
        $title = "Your Shares Report";

       // return view('dash.reports.share_report', compact('users','title'));
    }else{
        $users = User::with('shares')->get();  
        $title="All Shares Report Combined";
        
    }
    return view('dash.reports.share_report', compact('users','title'));

}
//$users = Shares::where('user_id',Auth::user()->id)->get(); 
public function savingsReport()
{
    if (Auth::user()->role == "Applicant") {
        // Retrieve only savings for the authenticated applicant
        $users = User::with(['savings' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->where('id', Auth::id())->get();

        $title = "Your Savings Report";
    } else {
        // Retrieve all savings for all users
        $users = User::with('savings')->get();
        $title = "All Savings Report Combined";
    }

    return view('dash.reports.savings_report', compact('users', 'title'));
}

public function depositReport()
{
   
    if (Auth::user()->role == "Applicant") {
        // Retrieve only deposits for the authenticated applicant
        $users = User::with(['deposite' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->where('id', Auth::id())->get();

        $title = "Your Deposit Report";
    } else {
        // Retrieve all deposits for all users
        $users = User::with('deposite')->get();
        $title = "All Deposit Report Combined";
    }

    return view('dash.reports.deposite_report', compact('users', 'title'));
}


public function shareDateReport(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    if (Auth::user()->role == "Applicant") {
        // Retrieve only shares for the authenticated applicant within the date range
        $users = User::with(['shares' => function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                $query->where('user_id', Auth::id())
                      ->whereBetween('created_at', [$startDate, $endDate]);
            } else {
                $query->where('user_id', Auth::id());
            }
        }])->where('id', Auth::id())->get();

        $title = "Your Shares Report from $startDate to $endDate";
    } else {
        // Retrieve all users with their shares filtered by date range
        $users = User::with(['shares' => function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }])->get();

        $title = "Shares Report from $startDate to $endDate";
    }

    return view('dash.reports.share_date_report', compact('users', 'startDate', 'endDate', 'title'));
}




public function savingsDateReport(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    if (Auth::user()->role == "Applicant") {
        // Fetch savings for the authenticated applicant filtered by date range
        $users = User::with(['savings' => function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }])->where('id', Auth::id())->get();

        $title = "Your Savings Report from $startDate to $endDate";
    } else {
        // Fetch all users with their savings filtered by date range
        $users = User::with(['savings' => function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }])->get();

        $title = "Savings Report from $startDate to $endDate";
    }

    return view('dash.reports.savings_date_report', compact('users', 'startDate', 'endDate', 'title'));
}




public function depositDateReport(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    if (Auth::user()->role == "Applicant") {
        // Fetch deposits for the authenticated applicant filtered by date range
        $users = User::with(['deposite' => function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }])->where('id', Auth::id())->get();

        $title = "Your Deposit Report from $startDate to $endDate";
    } else {
        // Fetch all users with their deposits filtered by date range
        $users = User::with(['deposite' => function ($query) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }])->get();

        $title = "Deposit Report from $startDate to $endDate";
    }

    return view('dash.reports.deposite_date_report', compact('users', 'startDate', 'endDate', 'title'));
}




}
