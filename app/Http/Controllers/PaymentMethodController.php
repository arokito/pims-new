<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index(){
        
        $methods =PaymentMethod::all();
        return view('methods.index',compact('methods'));
    }

    public function create(){

        return view('methods.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required'


        ]);
        $method = new PaymentMethod();
        $method->name =$request->name;
        $method->save();

        
       
        return redirect('methods.index')->with('message','method created');
    }

    public function edit( PaymentMethod $method){

        return view('methods.edit',compact('method'));
    }

    public function update(Request $request,$id){
        $method =PaymentMethod::find($id);
        $this->validate($request,[
            'name'=>'required'


        ]);
        $method->name =$request->name;
        $method->save();


        return redirect('methods.index')->with('message','method updated');



    }

    public function destroy(PaymentMethod $method){

        $method->delete();
        return back()->with('message','method deleted');
    }
}
