<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index(){

        $communities = Community::all();

        return view('communities.index',compact('communities'));
    }

    public function create(){

        


        return view('communities.create');
    }

    public function store(Request  $request){

        $request->validate([
            'name'=>'required', 
            'zone_id'=>'required',
            

        ]);
        $communities = Community::where('name', $request->name)->first();
    if(!$communities){
        $communities = new Community();
        $communities->name = $request->input('name');
        $communities->zone_id = $request->input('zone_id');
        $communities->save();

        return redirect('/communities')->with('message','jumuiya created');
     
    }
      else{
        return redirect('/communities')->with('message','name existis');
      }

        
       

        

    }

   
    public function edit(Community $community){
       
        return view('communities.edit',compact('community'));
    }

    public function update(Request $request ,$id){

        $communities=Community::find($id);
        $request->validate([
            'name'=>'required', 
            'zone_id'=>'required',


        ]);
       

       
       $communities->name = $request->input('name');
       $communities->zone_id = $request->input('zone_id');
       $communities->save();


       return redirect('/communities')->with('message','jumuiya created');

       
      
    }

    public function destroy(Community $community){

        $community->delete();
        return back()->with('message','community deleted');
    }
}
