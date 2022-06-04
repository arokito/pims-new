<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index(){

        $zones = Zone::all();
        return view('zones.index',compact('zones'));
    }
    public function create(){

       $user_id =auth()->user()->id;
       $user =User::find($user_id);
 
       


        return view('zones.create',compact('user'));
    }
    public function store(Request $request){




        // $validate =$request->validate([
        //     'name'=>'required',
        //     'user_id'=>'required'
            
        // ]);
        // dd($validate);


        $user_id =auth()->user()->id;
        // $user =User::find($user_id);
        // $users =$user->


        $this->validate($request,[
            'name'=>'required'


        ]);

        $zone = new Zone();
        $zone->name =$request->name;
        $zone->user_id=$user_id;
        $zone->save();
        

       
        return redirect('/zones')->with('message','kanda created');
    }

    public function edit(Zone $zone){
       
        return view('zones.edit',compact('zone'));
    }
    
    public function update(Request $request, Zone $zone){

        $validate = $request->validate([
            'name'=>'required',
        ]);
        $zone->update($validate);

        return redirect('/zones')->with('message','zone updated');
    }

    public function destroy(Zone $zone){

        $zone->delete();
        return back()->with('message','zone deleted');
    }
}
