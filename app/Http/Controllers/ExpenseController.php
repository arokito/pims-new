<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(){

        $expenses=Expense::all();

        return view('expenses.index',compact('expenses'));
    }


    public function create(){

        return view('expenses.create');
    }


    public function store(Request $request){
        $user_id =auth()->user()->id;
       

        
        $this->validate($request,[
            'amount'=>'required',
            'description'=>'required',
            


        ]);

        $expense =new Expense();
        $expense->amount=$request->input('amount');
        $expense->description=$request->input('description');
        $expense->user_id=$user_id;
        $expense->save();

        return redirect('/expenses')->with('message','expense  created');

         

    }

    public function edit(Expense $expense ){
        return view('expenses.edit',compact('expense'));



    }

    public function update(Request $request,$id){

        $expenses=Expense::find($id);
        $user_id=auth()->user()->id;

        $this->validate($request,[
            'amount'=>'required',
            'description'=>'required',
            


        ]);
        
        $expenses->amount=$request->input('amount');
        $expenses->description=$request->input('description');
        $expenses->user_id=$user_id;
        $expenses->save();

        return redirect('/expenses')->with('message','expense updated');



    }

    public function destroy(Expense $expense){

        $expense->delete();
        return back()->with('error','expense deleted');
    }
}
