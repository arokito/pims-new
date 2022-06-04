<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('roles.index',compact('roles'));
    }
  

    public function store(Request $request ){
        $validate =$request->validate([
            'name'=>'required',
            
        ]);
        Role::create($validate);

        return redirect()->route('roles.index')->with('message','role created');

    }

    // public function edit(Role $role){
    //     // $permissions = Permission::all();
    //     return view('roles.edit',compact('role'));
    // }

    public function update(Request $request, Role $role){

        $validate = $request->validate([
            'name'=>'required',
        ]);
        $role->update($validate);

        return redirect()->route('roles.index')->with('message','role updated');
    }

    public function destroy(Role $role){

        $role->delete();
        return back()->with('message','role deleted');
    }

   
}
