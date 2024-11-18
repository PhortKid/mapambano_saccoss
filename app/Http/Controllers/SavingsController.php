<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Savings;
use DB;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    
    public function index()
    {
    
        $users = User::all();
        $savings = Savings::with('user')->get();
        
        return view('dash.savings.index')->with('savings',$savings)->with('users',$users);
       
    }



    public function store(Request $request)
    {
        $data =$request->validate(
            [
            'user_id'=>['nullable'],
            'paid_in'=>['required'],
            'withdraw'=>['required'],
            ]
        );

 

        $savings=new Savings;
        $savings->user_id=$request->input('applicant');
        $savings->paid_in=$request->input('paid_in');
        $savings->withdraw=$request->input('withdraw');
       
        $savings->save();

        return redirect('/savings_management')->with('success','Saving Created');

    }


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

 

        $savings=Savings::find($id);
        $savings->properties_number=$request->input('properties_no');
       // $share->user_id=$request->input('applicant');
        $savings->paid_in=$request->input('paid_in');
        $savings->withdraw=$request->input('withdraw');
       
        $saving->save();
        return redirect('/savings_management')->with('success','Saving Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $savings=Savings::find($id);
        $savings->delete();
        return redirect('/savings_management')->with('success','Saving Deleted');
    }



}
