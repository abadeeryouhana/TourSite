<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Tour;
use App\Models\Gallery;
use App\Models\Customer_tour;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\tourMail;
use Carbon\carbon;
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tour = Tour::with('images', 'programs')->get();
        $city=Tour::select('city')->distinct('city')->get();
        //dd($city);
        return view('index')->with('tours', $tour)->with('city',$city);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::with('images', 'programs')->find($id);
        $city=Tour::select('city')->distinct('city')->get();

        return view('tourDetails')->with('tour', $tour)->with('city',$city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request) //Search for tours
    {

        $tour= new Tour;
        if(!empty($request->city))
        {
            $tour= $tour->where(  'city','like','%'.$request->city.'%');
        }

         if(!empty($request->check_in) && !empty($request->check_out))
        {
            $to=$request->check_out;
            $from= $request->check_in;

            $from = new DateTime($from);
            $to = new DateTime($to);


            if($from <= $to)
            {
                $to->add(new DateInterval('P1D'));
                $tour= $tour->whereBetween('startDate', [$from,$to]);

            }

            else
            {
                $from->add(new DateInterval('P1D'));
                $tour= $tour->whereBetween('startDate', [$to,$from]);
            }




        }

        if(!empty($request->duration1) && !empty($request->duration2) )
        {
            if($request->duration1 <= $request->duration2)
            {
                $tour= $tour->whereBetween('duration',[$request->duration1,$request->duration2]);
            }
            else
            {
                $tour= $tour->whereBetween('duration',[$request->duration2,$request->duration1]);
            }

        }

        if(!empty($request->cost1) && !empty($request->cost2))
        {
            if($request->cost1 <= $request->cost2)
            {
                $tour= $tour ->whereBetween('cost',[$request->cost1,$request->cost2]);
            }
            else
            {
                $tour= $tour ->whereBetween('cost',[$request->cost2,$request->cost1]);
            }
        }
        $tour=$tour->get();

        $city=Tour::select('city')->distinct('city')->get();


          return view('search')->with('tours',$tour)->with('city',$city);
    }

    public function cancel(Request $request) // Booking Cancel
    {
        // minus 1 from counter of tour //
        //dd( $request->code);
       // $tourId = DB::table('customer_tours')->where('code', $request->code)->get();
        $tourId=Customer_tour::where('code','=',$request->code)->first();


        // validattion
        if($tourId !==null)
        {
            $tour = Tour::find($tourId->t_id);

            $tour->numberofRegisters = $tour->numberofRegisters - 1;
            $tour->save();

            // delete this row of booking from Customer_tours table //
            $code=DB::table('customer_tours')->where('code',$request->code)->delete();


            return \redirect()->back()->with('message', 'تم الغاء الحجز بنجاح');
        }
        else
        {
            return \redirect()->back()->with('error', 'تأكد من الكود الصحيح للحجز');
        }





    }
    public function ajaxRequest(Request $request) // show data cancelled
    {


        $bookCode=Customer_tour::where('code','=',$request->code)->first();
        
        if($bookCode !==null)
        {
            $customer = Customer::find($bookCode->c_id);
         
            $tour = Tour::find($bookCode->t_id);
            return view('cancelData')->with('tour',$tour)->with('book',$bookCode)->with('customer',$customer);
        }
        elseif ($bookCode ===null)
        {

            return view('errorAjax');
        }

    }

/////////////////////////////////////////
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
        
        'phone' => 'required|numeric|min:11',
     
                
        ]);

        $customer= new Customer;
        $customer->name=$req->name;
        $customer->email=$req->email;
        $customer->country=$req->country;
        $customer->city=$req->city;
        $customer->street=$req->street;
        $customer->phone=$req->phone;
        $customer->save();
       }
        $customerTour= new Customer_tour;
        $customerTour->c_id=$customer->id;
        $customerTour->t_id=$id;
        $customerTour->numberOfPassengers=$req->NoOfPerson;
        $customerTour->dateOfbooking=carbon::now();
        $customerTour->totalCost=$req->cost * $req->NoOfPerson;
        $customerTour->progress=0;
        $customerTour->code=mt_rand(10000000000000, 99999999990000);
        $customerTour->save();
       // Mail::to($req->email)->send(new tourMail());
        $tour = Tour::find($id);
        $tour->increment('numberofRegisters',$req->NoOfPerson);
        $tour->save();
        return view('payment')->with('code',$customerTour->code)->with('totalCost',$customerTour->totalCost);

        
    }


    
   

}
