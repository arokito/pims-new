<?php
namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\Visa;
class CardController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('payments.paymentstripe');
    }
  
    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
        $request->validate([
            'category_id'=>'required', 
           

     

        ]);



        Contribution::create([ 
            'amount' => $request->amount,
            'parishioner_id' => $request->parishioner_id,
            'category_id' => $request->category_id,
            'currency' => "TZS",
            'receipt_number'=>$request->receipt_number,
         
            'payment_method_id' => 5
            
        ]);
      
  
       
          
        return back()->with('success','Payment has been successfully processed.');
    }
}