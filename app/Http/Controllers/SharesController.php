<?php

namespace App\Http\Controllers;
use App\Models\Shares;
use Illuminate\Http\Request;
use  App\Models\User;
use DB;

class SharesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $users = User::all();
        $shares = Shares::with('user')->get();
        
        return view('dash.shares.index')->with('shares',$shares)->with('users',$users);
       
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
            'paid_in'=>['required'],
            'withdraw'=>['required'],
            ]
        );

 

        $share=new Shares;
        $share->properties_number=$request->input('properties_no');
        $share->user_id=$request->input('applicant');
        $share->paid_in=$request->input('paid_in');
        $share->withdraw=$request->input('withdraw');
       
        $share->save();

        return redirect('/shares_management')->with('success','Share Created');

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
            'paid_in'=>['required'],
            'withdraw'=>['required'],
            ]
        );

 

        $share=Shares::find($id);
        $share->properties_number=$request->input('properties_no');
       // $share->user_id=$request->input('applicant');
        $share->paid_in=$request->input('paid_in');
        $share->withdraw=$request->input('withdraw');
       
        $share->save();
        return redirect('/shares_management')->with('success','Share Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $share=Shares::find($id);
        $share->delete();
        return redirect('/shares_management')->with('success','Share Deleted');
    }

    
}
