<?php

namespace App\Http\Controllers;

use App\Models\Parishioner;
use Illuminate\Http\Request;

class ParishionerController extends Controller
{
    public function index(){

        $parishioners= Parishioner::all();
        return view('parishioners.index',compact('parishioners'));
    }


    public function create(){

        return view('parishioners.create');
     }
     public function randomNumber()
     {
        $code = random_int(100000,999999);
        return $code;
     }


     public function store(Request  $request){

        $value ="unspecified";
        $user_id =auth()->user()->id;

        $request->validate([
            'first_name'=>'required', 
            'last_name'=>'required',
            'phone'=>'required',

     

        ]);
    
       $parishioner = new Parishioner;
       
       $parishioner->first_name = $request->input('first_name');
       $parishioner->middle_name = $request->input('middle_name');
       $parishioner->last_name = $request->input('last_name');
       $parishioner->phone = $request->input('phone');
       $parishioner->email = $request->input('email');
       $parishioner->pay_number = $this->randomNumber();
       $parishioner->ubatizo_place = $request->input('ubatizo_place');
       $parishioner->ubatizo_date = $request->input('ubatizo_date');
       $parishioner->komunio_place = $request->input('komunio_place');
       $parishioner->komunio_date = $request->input('komunio_date');
       $parishioner->ndoa = ($request->input('ndoa') ? $request->input('ndoa') : 0);
       $parishioner->status = ($request->input('status') ? $request->input('status') : 0);
       $parishioner->gender =($request->input('gender') ? $request->input('gender') : $value);
       $parishioner->user_id=$user_id;
       $parishioner->family_id=$request->input('family_id');
      
       $parishioner->save();

      


       
       return redirect()->route('parishioners.index')->with('message','Data added Successfully');

        
     

        

    }
    public function edit(Parishioner $parishioner){
       
        return view('parishioners.edit',compact('parishioner'));
    }

    public function update(Request $request ,$id){

        $user_id =auth()->user()->id;

        $parishioner=Parishioner::find($id);
        $request->validate([
            'first_name'=>'required', 
            'last_name'=>'required',
            'phone'=>'required',


        ]);
    
       $parishioner->first_name = $request->input('first_name');
       $parishioner->last_name = $request->input('last_name');
       $parishioner->phone = $request->input('phone');
       $parishioner->email = $request->input('email');
       $parishioner->ubatizo_place = $request->input('ubatizo_place');
       $parishioner->ubatizo_date = $request->input('ubatizo_date');
       $parishioner->komunio_place = $request->input('komunio_place');
       $parishioner->komunio_date = $request->input('komunio_date');
       $parishioner->ndoa = $request->input('ndoa');
       $parishioner->status = $request->input('status');
       $parishioner->user_id=$user_id;
       $parishioner->family_id=$request->input('family_id');

       $parishioner->save();


       return redirect()->route('parishioners.index')->with('message','parishioner updated');

       
      
    }

    public function destroy(Parishioner $parishioner){

        $parishioner->delete();
        return back()->with('message','parishioner deleted');
    }


    public function show(Parishioner $parishioner){

        $parishioners =Parishioner::find($parishioner);


        

        return view('parishioners.show',compact('parishioner','parishioners'));





    }
}


