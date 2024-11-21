<?php

namespace App\Http\Controllers;
use App\Models\Interest;
use Illuminate\Http\Request;
use  App\Models\User;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $interests = Interest::with('user')->get();
        
        return view('dash.interest.index')->with('interests',$interests)->with('users',$users);
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
            'tobe_paid'=>['required'],
            'paid'=>['nullable'],
            'date'=>['required'],

            ]
        );

 

        $interest=new Interest;
        $interest->user_id=$request->input('applicant');
        $interest->tobe_paid=$request->input('tobe_paid');
        $interest->date=$request->input('date');
        $interest->paid=$request->input('paid');
        $interest->save();
        return redirect('/interest_management')->with('success','Interest Created');
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
        $interests=Interest::find($id);
        $interests->delete();
        return redirect('/interest_management')->with('success','Interest Deleted');
    }
}
