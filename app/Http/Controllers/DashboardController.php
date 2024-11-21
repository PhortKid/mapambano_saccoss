<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      
        
         // Total balance of all time
         $totalSharesBalanceAllTime = DB::table('shares')->sum('balance');
         // Total balance for today
         $totalSharesBalanceToday = DB::table('shares')
             ->whereDate('date', Carbon::today())
             ->sum('balance');
         // Total balance for this month
         $totalSharesBalanceThisMonth = DB::table('shares')
             ->whereMonth('date', Carbon::now()->month)
             ->whereYear('date', Carbon::now()->year)
             ->sum('balance');
         // Total balance for this year
         $totalSharesBalanceThisYear = DB::table('shares')
             ->whereYear('date', Carbon::now()->year)
             ->sum('balance');



             //SAVING 

             // Total balance of all time
         $totalSavingsBalanceAllTime = DB::table('savings')->sum('balance');
         // Total balance for today
         $totalSavingsBalanceToday = DB::table('savings')
             ->whereDate('date', Carbon::today())
             ->sum('balance');
         // Total balance for this month
         $totalSavingsBalanceThisMonth = DB::table('savings')
             ->whereMonth('date', Carbon::now()->month)
             ->whereYear('date', Carbon::now()->year)
             ->sum('balance');
         // Total balance for this year
         $totalSavingsBalanceThisYear = DB::table('savings')
             ->whereYear('date', Carbon::now()->year)
             ->sum('balance');



          //DEPOSITE
             // Total balance of all time
         $totalDepositeBalanceAllTime = DB::table('deposite')->sum('balance');
         // Total balance for today
         $totalDepositeBalanceToday = DB::table('deposite')
             ->whereDate('date', Carbon::today())
             ->sum('balance');
         // Total balance for this month
         $totalDepositeBalanceThisMonth = DB::table('deposite')
             ->whereMonth('date', Carbon::now()->month)
             ->whereYear('date', Carbon::now()->year)
             ->sum('balance');
         // Total balance for this year
         $totalDepositeBalanceThisYear = DB::table('deposite')
             ->whereYear('date', Carbon::now()->year)
             ->sum('balance');


             
          //LOAN AMOUNT
             // Total balance of all time
         $totalLoansAmountAllTime = DB::table('loans')->sum('amount');
         // Total balance for today
         $totalLoansAmountToday = DB::table('loans')
             ->whereDate('created_at', Carbon::today())
             ->sum('amount');
         // Total balance for this month
         $totalLoansAmountThisMonth = DB::table('loans')
             ->whereMonth('created_at', Carbon::now()->month)
             ->whereYear('created_at', Carbon::now()->year)
             ->sum('amount');
         // Total balance for this year
         $totalLoansAmountThisYear = DB::table('loans')
             ->whereYear('created_at', Carbon::now()->year)
             ->sum('amount');


                 //LOAN BALANCE
             // Total balance of all time
         $totalLoansBalanceAllTime = DB::table('loans')->sum('balance');
         // Total balance for today
         $totalLoansBalanceToday = DB::table('loans')
             ->whereDate('created_at', Carbon::today())
             ->sum('balance');
         // Total balance for this month
         $totalLoansBalanceThisMonth = DB::table('loans')
             ->whereMonth('created_at', Carbon::now()->month)
             ->whereYear('created_at', Carbon::now()->year)
             ->sum('balance');
         // Total balance for this year
         $totalLoansBalanceThisYear = DB::table('loans')
             ->whereYear('created_at', Carbon::now()->year)
             ->sum('balance');






             return view('dash.index',[
                'total_shares_balance_all_time' => $totalSharesBalanceAllTime,
                'total_shares_balance_today' => $totalSharesBalanceToday,
                'total_shares_balance_this_month' => $totalSharesBalanceThisMonth,
                'total_shares_balance_this_year' => $totalSharesBalanceThisYear,
                //savings
                'total_savings_balance_all_time' => $totalSavingsBalanceAllTime,
                'total_savings_balance_today' => $totalSavingsBalanceToday,
                'total_savings_balance_this_month' => $totalSavingsBalanceThisMonth,
                'total_savings_balance_this_year' => $totalSavingsBalanceThisYear,
                //deposite
                'total_deposite_balance_all_time' => $totalDepositeBalanceAllTime,
                'total_deposite_balance_today' => $totalDepositeBalanceToday,
                'total_deposite_balance_this_month' => $totalDepositeBalanceThisMonth,
                'total_deposite_balance_this_year' => $totalDepositeBalanceThisYear,
                  //loan
                  'total_loans_balance_all_time' => $totalLoansBalanceAllTime,
                  'total_loans_balance_today' => $totalLoansBalanceToday,
                  'total_loans_balance_this_month' => $totalLoansBalanceThisMonth,
                  'total_loans_balance_this_year' => $totalLoansBalanceThisYear,

                  'total_loans_amount_all_time' => $totalLoansAmountAllTime,
                  'total_loans_amount_today' => $totalLoansAmountToday,
                  'total_loans_amount_this_month' => $totalLoansAmountThisMonth,
                  'total_loans_amount_this_year' => $totalLoansAmountThisYear,

            ]);

       // return view('dash.index');
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
}
