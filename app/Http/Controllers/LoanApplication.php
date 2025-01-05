<?php

namespace App\Http\Controllers;
use  App\Models\Savings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
class LoanApplication extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.loan_application.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $savings_balance = Savings::where('user_id',Auth::user()->id)->sum('balance');
        $my_balance=$savings_balance * 3;

       
        $request->validate([
            'amount' => 'required|numeric|min:0|max:'.$my_balance.'',
            'description' => 'required|string|max:255',
            'loan_term' => 'required|string|max:50',
        ]);

        LoanApplication::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'description' => $request->description,
            'loan_term' => $request->loan_term,
        ]);
    

        return redirect()->route('loan_application.index')->with('success', 'Loan application submitted successfully.');
    }

    /**
     * Display the specified loan application.
     */
    public function show($id)
    {
        $loanApplication = LoanApplication::findOrFail($id);

        // Ensure the user can only view their own applications
        if ($loanApplication->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

       // return view('loan_application.show', compact('loanApplication'));
    }

    /**
     * Show the form for editing the specified loan application.
     */
    public function edit($id)
    {
        $loanApplication = LoanApplication::findOrFail($id);

        if ($loanApplication->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        //return view('loan_applications.edit', compact('loanApplication'));
    }

    /**
     * Update the specified loan application in the database.
     */
    public function update(Request $request, $id)
    {
        $loanApplication = LoanApplication::findOrFail($id);

        if ($loanApplication->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'loan_term' => 'required|string|max:50',
        ]);

        $loanApplication->update([
            'amount' => $request->amount,
            'description' => $request->description,
            'loan_term' => $request->loan_term,
        ]);

       // return redirect()->route('loan_applications.index')->with('success', 'Loan application updated successfully.');
    }

    /**
     * Remove the specified loan application from the database.
     */
    public function destroy($id)
    {
        $loanApplication = LoanApplication::findOrFail($id);

        if ($loanApplication->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $loanApplication->delete();

        return redirect()->route('loan_application.index')->with('success', 'Loan application deleted successfully.');
    }


    public function list()
    {


       // $loan_application=LoanApplication::all();
        //$loan_applications= LoanApplication::with('user')->get();
        $loan_applications = User::with('loanApplications')->get();
        return view('dash.loan_application.applications')->with('loan_applications',$loan_applications);
    }
}
