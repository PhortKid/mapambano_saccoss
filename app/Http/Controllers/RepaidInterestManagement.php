<?php

namespace App\Http\Controllers;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;

class RepaidInterestManagement extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('loans')->get();

        return view('dash.repaid_interest.index', compact('users'));
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
      //  $interest = Interest::findOrFail($request->interest_id);


        
      $fromdatabase=Interest::find($request->interest_id);

        $request->validate([
            'amount' => [
                'required',
                'numeric',
                'max:' . $fromdatabase->balance, 
            ],
        ]);  
    
        

        $newpaid=Interest::find($request->interest_id);
        $answer=$fromdatabase->paid+$request->amount;
        $newpaid->paid=$answer;
        $newpaid->save();

        return redirect('/repaid_interest_management')->with('success','Added');
       
    
       
        
    /*
        // Sasisha salio
        $loan->balance -= $paymentAmount;
        $loan->save();
      
        
        return redirect('/repaid_management')->with('success','success');  */
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
