<?php

namespace App\Http\Controllers;

use App\Models\Parishioner;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function loadPayment(){

        return view('front.index');
    }

    public function verifyPayNumber(Request $request){
       
        $payNumber = $request->input('pay_number');
        $check = Parishioner::where('pay_number',$payNumber)->get();
        if($check){
            return view('front.verify-info', compact('check'));
        }else{

        }
        
        

    }
}
