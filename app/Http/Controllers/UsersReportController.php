<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::user()->role!='Applicant'){
            $users = User::all();
        }else{
            $users = User::where('id',Auth::user()->id)->get();
        }
       
       return view('dash.users_report.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function showUserReport($userId)
{
    $user = User::with('loans.transactions')->findOrFail($userId);

    return view('dash.users_report.person', compact('user'));
}



public function userLoanReport()
{
    // Pata watumiaji wote na mikopo yao na salio
    $users = User::with('loans')->get();

    // Hesabu jumla ya mikopo na salio
    $totalLoanAmount = 0;
    $totalBalance = 0;

    // Pitia kila mtumiaji na jumlisha mikopo na salio
    foreach ($users as $user) {
        foreach ($user->loans as $loan) {
            $totalLoanAmount += $loan->amount;
            $totalBalance += $loan->balance;
        }
    }

    return view('dash.users_report.all_users_report', compact('users', 'totalLoanAmount', 'totalBalance'));
}


}


