<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
class BalanceController extends Controller
{
    // Display a list of balances
    public function index()
    {
        $balances = Balance::all();
        return view('dash.balances.index', compact('balances'));
    }

    // Show form to create a new balance
    public function create()
    {
        return view('dash.balances.create');
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
    $request->validate([
        'month' => 'required|date_format:Y-m', // Format ya mwaka-mwezi
    ]);

    $month = $request->input('month');
    $balances = Balance::whereMonth('created_at', '=', date('m', strtotime($month)))
                       ->whereYear('created_at', '=', date('Y', strtotime($month)))
                       ->get();

    // Calculate totals
    $totals = [
        'opening_debit' => $balances->sum('opening_debit'),
        'opening_credit' => $balances->sum('opening_credit'),
        'monthly_debit' => $balances->sum('monthly_debit'),
        'monthly_credit' => $balances->sum('monthly_credit'),
        'total_debit' => $balances->sum('total_debit'),
        'total_credit' => $balances->sum('total_credit'),
    ];

    return view('dash.balances.report', compact('balances', 'totals', 'month'));
}
}
