<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomersController extends Controller
{
    public function index(Request $request){
        $data['title'] = "CUSTOMER";
        if(request()->ajax()){
            return datatables()->of(Customer::select([
                'id','name','phone','country','city','street','email'
               ])
            )
            ->addIndexColumn()
            ->addColumn('action','dashboard.datatable.customer-action')
            ->rawColumns(['status', 'action'])
            ->make(true);
        }
        // dd(User::all());
        return view('dashboard.customers.list',$data);
    }

    public function edit($id,Request $request){
        // dd($id);
        $data['title'] = 'EDIT CUSTOMER';
        $data['result'] = Customer::where('id',$id)
        ->first(['id','name','phone','country','city','street','email']);
        // dd($data['result']);
        return view('dashboard.customers.add-edit',$data);

    }

    public function delete($id){
        $user = Customer::findOrFail($id)->delete();
        return Redirect::to("dashboard/customers")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }
}
