<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Tour;
use App\Models\Gallery;
use App\Models\Customer_tour;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\tourMail;
use Carbon\carbon;
class paymentController extends Controller
{
    //


    public function getBooking($id){
        //$users = Tour::with('galleries')->get();

       $t = Tour::find($id);
       $tour = $t->load('galleries'); 
      // dd($tour);
     return view('booking')->with('tour',$tour); 
    }
     public function booking(Request $req,$id){
       $customer = Customer::where('email', '=', $req->email)->first();
       if ($customer === null) {
         $validatedData = request()->validate([
        
        'name' => 'required|string|max:255',
        
        'email' => 'required| string|email|max:255|unique:customers',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'zipCode' => 'required|numeric',
        'phone' => 'required|numeric',
        'NoOfPerson'=>'required|numeric'
                
        ]);}
         $cost=$req->cost * $req->NoOfPerson;
  session(['name' => $req->name,'email' => $req->email,'street' => $req->street,'city' => $req->city,'country' => $req->country,'zipCode' => $req->zipCode,'phone' => $req->phone,'tourID'=>$id,'NoOfPerson'=>$req->NoOfPerson,'cost'=>$cost
]);
        return \Response::json("ok"); 
        

        
    }


     public function getCheckoutSuccess($name){
      if(session('secretz1z1') ==""){
        return abort('403');
      }
      $value = session('key');
      $Customer = Customer::where('email', '=', session('email'))->first();
       
      if ($Customer === null) {
         $Customer = new Customer;       
        $Customer->name= session('name');      
        $Customer->email = session('email');  
        $Customer->street = session('street');
        $Customer->city = session('city');
        $Customer->country = session('country');
        $Customer->phone = session('phone');       
     
        $Customer->save();
       }
         $code=mt_rand(10000000000000, 99999999990000);
       
       $customerTour = Customer_tour::where('code', '=', $code)->first();
       if($customerTour1===null)
        $code=mt_rand(10000000000000, 99999999990000);
        $customerTour= new Customer_tour;
        $customerTour->c_id=$Customer->id;
        $customerTour->t_id=session('tourID');       
     ;
        $customerTour->numberOfPassengers=session('NoOfPerson');
        $customerTour->dateOfbooking=carbon::now();
        $customerTour->totalCost=session('cost') * session('NoOfPerson');
        $customerTour->progress=0;

        $customerTour->code=$code;
        $customerTour->save();
         $tour = Tour::find($id);
        $tour->increment('numberofRegisters',session('NoOfPerson'));
      
       
        // Mail::to($req->email)->send(new tourMail());

       session()->forget('secretz1z1');
        
        Session::flash('success','your payment successfull '.$name); 
        
        return view('tiketshow')->with('code',$customerTour->code);;
       
    }
      public function makepay(){
       $mode=config('paypal.settings.mode');

        $client_id = config('paypal.live.client_id');
        $secret = config('paypal.live.secret'); 
        if($mode=="sandbox"){
        $client_id = config('paypal.sandbox.client_id');
        $secret = config('paypal.sandbox.secret');
        }
        else{
          $client_id = config('paypal.live.client_id');
          $secret = config('paypal.live.secret');  
        }
        
       
        return view('pay')->with('client_id',$client_id);
     }
     public function checkoutCancel(){
      Session::flash('failed','your payment cancel ! ');
      return redirect('/paypal/payment');

     }
     public function getCheckoutError($err=null){
      if(!$err)
        Session::flash('failed','Transaction error !! ' );
      Session::flash('failed','Transaction error !! '.$err );
      return redirect('/paypal/payment/');

     }
}
