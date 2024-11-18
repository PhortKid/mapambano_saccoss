<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loans;

class RepaidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('loans')->get();

        return view('dash.repaid.index', compact('users'));
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
        $loan = Loans::findOrFail($request->loan_id);

        $minimumPayment = $loan->balance * 0.10; // Asilimia 10 ya salio
    
        $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:' . $minimumPayment, // Angalau 10% ya salio
                'max:' . $loan->balance,  // Isiwe zaidi ya salio
            ],
        ]);
    
        $paymentAmount = $request->amount;
        $fee = $paymentAmount * 0.10; // Ada ya 10% ya malipo
    
        // Hifadhi muamala
        $loan->transactions()->create([
            'amount' => $paymentAmount,
            'fee' => $fee,
        ]);
    
        // Sasisha salio
        $loan->balance -= $paymentAmount;
        $loan->save();
      
        
        return redirect('/repaid_management')->with('success','success');
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
