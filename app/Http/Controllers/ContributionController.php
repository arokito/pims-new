<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\ContributionCategory;
use App\Models\Parishioner;
use App\Models\PaymentMethod;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContributionController extends Controller
{
    public function index(){

    
       $contribution = Contribution::all();
      
        //  $parishioner = Parishioner::with('contributions')->get();   
         
       
        return view('contributions.index',compact('contribution'));


    }


    public function sendSMS($phone_number,$full_name ,$amount, $category){

        $api_key='8d4664249a9132c9'; 
        $secret_key = 'NDY1OWQ2N2JkOTgzZmRlZjBlNjlhZTUyZDY4ODVlMzM2MjFhMDEwY2YwZDI4MzFkZmJhMGM3ODFkMGRiMjhmNg==';
        
        $message = "Ahsante " . $full_name ."  Mchango wako kiasi cha  ".$amount. "/= kwa ajili ya  ".$category.", Umepokelewa katika Parokia yetu Ahsante na Mungu akubariki." ;
        
     
    
        $postData = array(
            'source_addr' => 'KOKAYA',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => $message,
            'recipients' => [
    
    
                array('recipient_id' => '1','dest_addr'=>$phone_number)
                
                
                
                ]
        );
        
        $Url ='https://apisms.beem.africa/v1/send';
        
        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        
        $response = curl_exec($ch);
        
        // if($response === FALSE){
        //         echo $response;
        
        //     die(curl_error($ch));
        // }
        // var_dump($response);
    
        
     }



  

public function create(){
    $contribution_categories = ContributionCategory::all();
    $payment_methods = PaymentMethod::all();
    $parishioners = Parishioner::all();
    return view('contributions.create', compact('payment_methods', 'contribution_categories', 'parishioners'));
}

public function store(Request $request)
{
    // return response()->json(
    //     $request->all()
    //     , 200);

    // Validator::validate($request->all(), [

    // ]);

    // json_decode($request->get('contribution_category'))->id

    $parishioner_id = $request->get('parishioner_id');
    $control_number = $request->get('control_number');
    if ($control_number) {
        $parishioner = Parishioner::where('pay_number', $control_number);
        if ($parishioner->exists()) {
            $parishioner_id = $parishioner->first()->id;
        }
    }
    $parishioner_tmp = Parishioner::find($parishioner_id);
    $parishioner_name = $parishioner_tmp->first_name . " " . $parishioner_tmp->last_name;
   
    // return response()->json(
    //     [$parishioner_tmp, $parishioner_name]
    //     , 200);

    $contribution = new Contribution;
    $contribution->parishioner_id = $parishioner_id;
    $contribution->amount = $request->get('amount');
    $contribution->payment_method_id = json_decode($request->get('payment_method'))->id;
    $contribution->category_id = json_decode($request->get('contribution_category'))->id;
    $contribution->receipt_number =$this->generateReceiptNumber();
   
    $contribution->save();

    

        $this->sendSMS($parishioner_tmp->phone, $parishioner_name , $request->amount,  json_decode($request->get('contribution_category'))->name);
    

    return redirect()->route('contributions.create')->with('message', 'Contribution received, thank you! 😊');
}

private function generateReceiptNumber()
{
    $timeString  = time();
    $receipt = rand(100000, 999999);
    $referenceNumber=$timeString.''.$receipt;
  
    return $referenceNumber;
}

public function createContribution(){
    return view('contributions.create');
}


public function destroy(Contribution $contribution){

    $contribution->delete();
    return back()->with('error','contribution deleted');
}





}
