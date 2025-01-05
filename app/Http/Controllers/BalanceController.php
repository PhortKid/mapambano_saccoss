<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
class BalanceController extends Controller
{
    // Display a list of balances
    public function index(Request $request)
    {   
        $query = Balance::query();

    // Check if 'month' is filled and filter by month
    if ($request->filled('month')) {
        $query->whereMonth('created_at', '=', date('m', strtotime($request->month)))
              ->whereYear('created_at', '=', date('Y', strtotime($request->month)));
    }

    // Check if 'date' is filled and filter by date
    if ($request->filled('date')) {
        $query->whereDate('created_at', '=', $request->date);
    }

    // Get all records or filtered records, paginated
    $balances = $query->paginate(10);

    return view('dash.balances.index', compact('balances'));
    }

    // Show form to create a new balance
    public function create(Request $request)
    {
        $lastmonth_title=$request->maelezo;
        $lastmonth_credit=$request->total_credit;
        $lastmonth_debit=$request->total_debit;
        return view('dash.balances.create',[
            'lastmonth_title'=>$lastmonth_title,
            'lastmonth_credit'=>$lastmonth_credit,
            'lastmonth_debit'=>$lastmonth_debit,
        ]);
    }

    // Store a new balance
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'opening_debit' => 'numeric',
            'opening_credit' => 'numeric',
            'monthly_debit' => 'numeric',
            'monthly_credit' => 'numeric',
            'jonal_debit' => 'numeric',
            'jonal_credit' => 'numeric',
            'date' => 'required',
        ]);

        $balance = new Balance($request->all());
        $balance->calculateTotals(); // Calculate totals before saving
        $balance->save();

        return redirect()->route('balances.index')->with('success', 'Balance created successfully.');
        
    }

    // Show a single balance
    public function show(Balance $balance)
    {
        return view('dash.balances.show', compact('balance'));
    }

    // Show form to edit a balance
    public function edit(Balance $balance)
    {
        return view('dash.balances.edit', compact('balance'));
    }

    // Update a balance
    public function update(Request $request, Balance $balance)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'opening_debit' => 'numeric',
            'opening_credit' => 'numeric',
            'monthly_debit' => 'numeric',
            'monthly_credit' => 'numeric',
            'jonal_debit' => 'numeric',
            'jonal_credit' => 'numeric',
        ]);

        $balance->fill($request->all());
        $balance->calculateTotals();
        $balance->save();

        return redirect()->route('balances.index')->with('success', 'Balance updated successfully.');
    }

    // Delete a balance
    public function destroy(Balance $balance)
    {
        $balance->delete();
        return redirect()->route('balances.index')->with('success', 'Balance deleted successfully.');
    }




    public function report()
{
    return view('dash.balances.report'); // Form ya kuchagua mwezi
}

public function generateReport(Request $request)
{
    $is_report_balance=8;
    $request->validate([
        'month' => 'required|date_format:Y-m', // Format ya mwaka-mwezi
    ]);

    $month = $request->input('month');
    $balances = Balance::whereMonth('date', '=', date('m', strtotime($month)))
                       ->whereYear('date', '=', date('Y', strtotime($month)))
                       ->get();

    // Calculate totals
    $totals = [
        'opening_debit' => $balances->sum('opening_debit'),
        'opening_credit' => $balances->sum('opening_credit'),
        'monthly_debit' => $balances->sum('monthly_debit'),
        'monthly_credit' => $balances->sum('monthly_credit'),
        'jonal_debit' => $balances->sum('jonal_debit'),
        'jonal_credit' => $balances->sum('jonal_credit'),
        'total_debit' => $balances->sum('total_debit'),
        'total_credit' => $balances->sum('total_credit'),
    ];

    return view('dash.balances.report', compact('balances', 'totals', 'month','is_report_balance'));
}
}
