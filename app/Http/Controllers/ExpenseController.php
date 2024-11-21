<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use   App\Models\Expense;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('dash.expenses.index')->with('expenses',$expenses);
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
            'expense_description'=>['required'],
            'credit'=>['nullable','numeric'],
            'debit'=>['nullable','numeric'],
            'date'=>['required'],
            ]
        );

 

        $expenses=new Expense();
        $expenses->expense_description=$request->input('expense_description');
        $expenses->credit=$request->input('credit');
        $expenses->debit=$request->input('debit');
        $expenses->date=$request->input('date');
       
        $expenses->save();

        return redirect('/expenses_management')->with('success','Expense Created');
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
            'expense_description'=>['required'],
            'credit'=>['nullable','numeric'],
            'debit'=>['nullable','numeric'],
            'date'=>['required'],
            ]
        );

 

        $expenses=Expense::find($id);
        $expenses->expense_description=$request->input('expense_description');
        $expenses->credit=$request->input('credit');
        $expenses->debit=$request->input('debit');
        $expenses->date=$request->input('date');
       
        $expenses->save();

        return redirect('/expenses_management')->with('success','Expense Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expenses=Expense::find($id);
        $expenses->delete();
        return redirect('/expenses_management')->with('success','Expense Deleted');
    }
}
