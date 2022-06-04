<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContributionCategory;

class ContributionCategoryController extends Controller
{
    public function index(){

        $categories =ContributionCategory::all();

        return view('categories.index',compact('categories'));
    }

    public function create(){

        return view('categories.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required'


        ]);
        $category = new ContributionCategory();
        $category->name =$request->name;
        $category->save();

        
       
        return redirect('categories.index')->with('message','category created');
    }

    public function edit( ContributionCategory $category){

        return view('categories.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category =ContributionCategory::find($id);
        $this->validate($request,[
            'name'=>'required'


        ]);
        $category->name =$request->name;
        $category->save();


        return redirect('categories.index')->with('message','category updated');



    }

    public function destroy(ContributionCategory $category){

        $category->delete();
        return back()->with('message','category deleted');
    }
}
