<?php

namespace App\Http\Controllers;
use App\Models\Deposite;
use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;

class DepositeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role!='Applicant'){
        $users = User::all();
        $deposites = Deposite::with('user')->get();
    }else{
        $users = User::where('id',Auth::user()->id)->get();
        $deposites = Deposite::with('user')->get();
    }
        
        return view('dash.deposites.index')->with('deposites',$deposites)->with('users',$users);
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
            'user_id'=>['nullable'],
            'paid_in'=>['required'],
            'withdraw'=>['required'],
            'date'=>['required'],

            ]
        );

 

        $deposites=new Deposite;
        $deposites->user_id=$request->input('applicant');
        $deposites->paid_in=$request->input('paid_in');
        $deposites->date=$request->input('date');
        $deposites->withdraw=$request->input('withdraw');
       
        $deposites->save();

        return redirect('/deposites_management')->with('success','Saving Created');
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
            'paid_in'=>['required'],
            'withdraw'=>['required'],
            'date'=>['required'],
            ]
        );

 

        $deposites=Deposite::find($id);
        $deposites->paid_in=$request->input('paid_in');
        $deposites->date=$request->input('date');
        $deposites->withdraw=$request->input('withdraw');
       
        $deposites->save();
        return redirect('/deposites_management')->with('success','Saving Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deposites=Deposite::find($id);
        $deposites->delete();
        return redirect('/savings_management')->with('success','Saving Deleted');
    }
}
