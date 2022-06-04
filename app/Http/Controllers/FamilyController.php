<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(){

        $families =Family::all();
        return view('families.index',compact('families'));
    }


     public function create(){

        return view('families.create');
     }


     public function store(Request  $request){

        $request->validate([
            'name'=>'required', 
            'community_id'=>'required',

        ]);
    
       $families = new Family();
       $families->name = $request->input('name');
       $families->community_id = $request->input('community_id');
       $families->save();

        
       return redirect()->route('families.index')->with('message','family created');

        

    }
    public function edit(Family $family){
       
        return view('families.edit',compact('family'));
    }

    public function update(Request $request ,$id){

        $family=Family::find($id);
        $request->validate([
            'name'=>'required', 
            'community_id'=>'required',


        ]);
       

       
       $family->name = $request->input('name');
       $family->community_id = $request->input('community_id');
       $family->save();


       return redirect()->route('families.index')->with('message','family updated');

       
      
    }

    public function destroy(Family $family){

        $family->delete();
        return back()->with('error','community deleted');
    }

}
