<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $loans = Loans::with('user')->get();
        
        return view('dash.loans.index')->with('loans',$loans)->with('users',$users);
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
        $data =$request->validate(
            ['applicant'=>['required'],
            'amount'=>['required'],
           // 'rate'=>['required'],
            'date'=>['required'],
            ]
        );
    
 

        
 
            $loan = Loans::create([
                'user_id' => $request->applicant,
                'date' => $request->date,
               // 'amount' => $request->amount*$request->rate+$request->amount,
              //  'balance' => $request->amount*$request->rate+$request->amount,
                'amount' => $request->amount,
                'balance' => $request->amount
            ]);
        
       
    
       // return response()->json(['message' => 'Mkopo umeundwa kwa mafanikio!', 'loan' => $loan]);
        return redirect('/loans_management')->with('success','Loan Added!');
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
       
        return redirect('/loans_management')->with('success','Loan Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan=Loans::find($id);
        $loan->delete();
        return redirect('/loans_management')->with('success','Loan Deleted');
    }
}
