<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Savings;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SavingsController extends Controller
{
    
    public function index()
    {
        if(Auth::user()->role!='Applicant'){
        $users = User::all();
        $savings = Savings::with('user')->get();
        }else{
            $users = User::where('id',Auth::user()->id)->get();
        $savings = Savings::with('user')->get();
        }
        
        return view('dash.savings.index')->with('savings',$savings)->with('users',$users);
       
    }



    public function store(Request $request)
    {
        $data =$request->validate(
            [
            'user_id'=>['nullable'],
            'paid_in'=>['required'],
            'date'=>['required'],
            'withdraw'=>['required'],
            ]
        );

 

        $savings=new Savings;
        $savings->user_id=$request->input('applicant');
        $savings->paid_in=$request->input('paid_in');
        $savings->withdraw=$request->input('withdraw');
        $savings->date=$request->input('date');
        $savings->save();

        return redirect('/savings_management')->with('success','Saving Created');

    }


    public function update(Request $request, string $id)
    {
        $data =$request->validate(
            [
           // 'user_id'=>['required'],
            'paid_in'=>['required'],
            'date'=>['required'],
            'withdraw'=>['required'],
            ]
        );

 

        $savings=Savings::find($id);
       
       // $share->user_id=$request->input('applicant');
        $savings->paid_in=$request->input('paid_in');
        $savings->date=$request->input('date');
        $savings->withdraw=$request->input('withdraw');
       
        $savings->save();
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
