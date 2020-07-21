<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request){
        $data['title'] = "USERS";
        // if(request()->ajax()){
        //     return datatables()->of(User::select([
        //         'id','phone','username','password','authorization','created_at'
        //     ])
        //     )
        //     ->
        // }
        return view('dashboard.users.index');
    }
}
