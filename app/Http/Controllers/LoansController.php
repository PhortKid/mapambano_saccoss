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
            [
            'properties_no'=>['required'],
            'user_id'=>['nullable'],
            'issued'=>['required'],
            'repaid'=>['required'],
            ]
        );

 

        $loan=new Loans;
        $loan->properties_number=$request->input('properties_no');
        $loan->user_id=$request->input('applicant');
        $loan->issued=$request->input('issued');
        $loan->repaid=$request->input('repaid');
        $loan->save();

        return redirect('/loans_management')->with('success','Loan Created');
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
        $data =$request->validate(
            [
            'properties_no'=>['required'],
           // 'user_id'=>['required'],
            'issued'=>['required'],
            'repaid'=>['required'],
            ]
        );

 

        $loan=Loans::find($id);
        $loan->properties_number=$request->input('properties_no');
       // $loan->user_id=$request->input('applicant');
        $loan->issued=$request->input('issued');
        $loan->repaid=$request->input('repaid');
       
        $loan->save();
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
