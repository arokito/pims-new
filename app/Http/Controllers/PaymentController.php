<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\OAuth\OAuthUtil;
use App\OAuth\OAuthToken;
use App\OAuth\OAuthServer;
use App\Models\Parishioner;
use App\OAuth\OAuthRequest;
use App\Models\Contribution;
use App\OAuth\OAuthConsumer;
use Illuminate\Http\Request;
use App\OAuth\OAuthDataStore;
use App\OAuth\OAuthSignatureMethod;
use App\OAuth\OAuthSignatureMethod_RSA_SHA1;
use App\OAuth\OAuthSignatureMethod_HMAC_SHA1;
use App\OAuth\OAuthSignatureMethod_PLAINTEXT;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{

    
    private $params;
    private $token;
    private $consumer_key =    '87xclFHckvQqY2PFNHwY0BKlqOejeVXI';
    private $consumer_secret = 'ngnXiwm6ZXzzXJ5MlLjPkHXm3sQ=';
    private OAuthSignatureMethod_HMAC_SHA1 $signatureMethod;
    private OAuthConsumer $consumer;
    

    


    public function verifyPayNumber(Request $request){
       
        $payNumber = $request->input('pay_number');
        $parishioner_pay = Parishioner::where('pay_number',$payNumber)->get();

       
        if($parishioner_pay->count() > 0){
            return view('payments.payment', compact('parishioner_pay'));
           
        }else{

            // return 'not found' ;
            return back()->with('status','invalid code');
            
        }


        



        
        

    }




    public function randomNumber()
    {
       $code = random_int(100000,999999);
       return $code;
    }

    public function selfReg(Request $request){

        $value ="unspecified";
    

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
       $parishioner->user_id=1;
       $parishioner->family_id=$request->input('family_id');
      
       $parishioner->save();

       $parishioner_pay = Parishioner::where('pay_number',$parishioner->pay_number)->get();
       if($parishioner_pay){
           return view('payments.payment', compact('parishioner_pay'));
       }else{
           
       }







    }

    public function selfRegIndex(){

        return view('parishioners.self-reg');
    }



    //
    public function loadForm( $id){

        $parishioner_pay = Parishioner::find($id);

        return view('payments.payment',compact('parishioner_pay'));
    }

    public function getTransactionDetails($merchantRef, $trackingId)
    {
        $url = 'https://www.pesapal.com/API/PostPesapalDirectOrderV4';

        $responseData = $this->getResponseData($merchantRef, $trackingId, $url);

        return $responseData;

        $pesapalResponse = explode(",", $responseData);

        return [
            'pesapal_transaction_tracking_id' => $pesapalResponse[0],
            'payment_method' => $pesapalResponse[1],
            'status' => $pesapalResponse[2],
            'pesapal_merchant_reference' => $pesapalResponse[3],
        ];
    }

    public static function modify($transaction)
    {
        // Status will always detect a change and send notifications by IPN
        $payment = Contribution::whereReference($transaction['pesapal_merchant_reference'])->first();

        return $payment->update([
            'status' => $transaction['status'],
            'payment_method' => $transaction['payment_method'],
            'tracking_id' => $transaction['pesapal_transaction_tracking_id'],
        ]);
    }

    private function getResponseData(string $merchantReference, $trackingId, string $url)
    {
        $requestStatus = $this->initRequestStatus($url);

        $requestStatus->set_parameter("pesapal_merchant_reference", $merchantReference);
        $requestStatus->set_parameter("pesapal_transaction_tracking_id", $trackingId);
        $requestStatus->sign_request($this->signatureMethod, $this->consumer, $this->token);

        return $this->curlRequest($requestStatus);
    }

    
  
    private function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    

    public function getStatus()
    {
        
        $this->consumer = new OAuthConsumer($this->consumer_key, $this->consumer_secret); 
        $this->signatureMethod = new OAuthSignatureMethod_HMAC_SHA1(); 

         $this->getTransactionDetails('dslfjsdf', 'l 0uou');
        $transaction = $this->getTransactionDetails('dslfjsdf', 'l 0uou');
        $this->modify($transaction);  
    }

    public function sendRequest(Request $request){


//pesapal params
$this->token = $this->params = NULL;



/*
PesaPal Sandbox is at http://demo.pesapal.com. Use this to test your developement and
when you are ready to go live change to https://www.pesapal.com.
*/
$consumer_key =    '87xclFHckvQqY2PFNHwY0BKlqOejeVXI';//Register a merchant account on
                   //demo.pesapal.com and use the merchant key for testing.
                   //When you are ready to go live make sure you change the key to the live account
                   //registered on www.pesapal.com!
$consumer_secret = 'ngnXiwm6ZXzzXJ5MlLjPkHXm3sQ=';// Use the secret from your test
                   //account on demo.pesapal.com. When you are ready to go live make sure you
                   //change the secret to the live account registered on www.pesapal.com!
$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
$iframelink = 'https://www.pesapal.com/api/PostPesapalDirectOrderV4';//change to
                   //https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!

 $this->consumer = new OAuthConsumer($consumer_key,$consumer_secret);
//get form details
$amount = $_POST['amount'];
$amount = number_format($amount, 2);//format amount to 2 decimal places

$desc = $_POST['description'];
$type = $_POST['type']; //default value = MERCHANT
$reference = $_POST['reference'];//unique order id of the transaction, generated by merchant
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phonenumber = '';//ONE of email or phonenumber is required

$callback_url = 'http://127.0.0.1:8000/payment-status'; //redirect url, the page that will handle the response from pesapal.

$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"http://www.pesapal.com\" />";
$post_xml = htmlentities($post_xml);

$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

//post transaction to pesapal
$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $this->token, "GET", $iframelink, $this->params);
$iframe_src->set_parameter("oauth_callback", $callback_url);
$iframe_src->set_parameter("pesapal_request_data", $post_xml);
$iframe_src->sign_request($signature_method, $consumer, $this->token);

$save_to_db = Contribution::create([
    'amount' => $request->amount,
    'reference' => $request->reference,
    'parishioner_id' => $request->parishioner_id,
    'category_id' => $request->category_id,
    'payment_method_id' => 3
]);



return view('payments.pesapal-iframe', compact('iframe_src'));
        //end function
    }

    private function initRequestStatus($url)
    {
        return OAuthRequest::from_consumer_and_token(
            $this->consumer,
            $this->token,
            'GET',
            $url,
            $this->params
        );
    }


    private function curlRequest($request_status)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request_status);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        if(defined('CURL_PROXY_REQUIRED')) if (CURL_PROXY_REQUIRED == 'True'){
            $proxy_tunnel_flag = (
                defined('CURL_PROXY_TUNNEL_FLAG')
                && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE'
            ) ? false : true;
            curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
        }

        $response 	  = curl_exec($ch);
        $header_size  = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $raw_header   = substr($response, 0, $header_size - 4);
        $headerArray  = explode("\r\n\r\n", $raw_header);
        $header 	  = $headerArray[count($headerArray) - 1];

        // Payment status
        $elements = preg_split("/=/",substr($response, $header_size));

        curl_close($ch);
        return $elements;
    }














}
