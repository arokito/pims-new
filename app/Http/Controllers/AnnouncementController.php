<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;

class AnnouncementController extends Controller 
{
    public function create(){

        return view('announcements.create');
    }

    public function index(){
        $announcement = Announcement::all();
        return view('announcements.index',compact('announcement'));
    }


    public function store(Request $request){
        $user_id =auth()->user()->id;
        $file =$request->file('file_url');
        // return var_dump($file);

        $announcement = new Announcement();
        $announcement->title =$request->title;
        $announcement->user_id=$user_id;
        $announcement->file_url=$file;
        $announcement->addMedia($file)->toMediaCollection();
        $announcement->save();

      
        return redirect()->route('announcements.index')->with('message','file uploaded successfuly');

      



    }

    public function edit(Announcement $announcement){
       
        return view('announcments.edit',compact('announcement'));
    }

    public function update(Request $request ,$id){

        $user_id =auth()->user()->id;
        $file =$request->file('file_url');

        $announcement=Announcement::find($id);
        $announcement->title =$request->title;
        $announcement->user_id=$user_id;
        $announcement->file_url=$file;
        $announcement->addMedia($file)->toMediaCollection();
        $announcement->save();
        return redirect('announcements.index')->with('message','announcement updated');
      


      
       

       
      

       
      
    }

    public function destroy(Announcement $announcement){

        $announcement->delete();
       
        return back()->with('message','tangazo limefutwa');
        
    }
}
