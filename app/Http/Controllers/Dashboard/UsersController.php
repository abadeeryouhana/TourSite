<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index(Request $request){
        $data['title'] = "USERS";
        if(request()->ajax()){
            return datatables()->of(User::select([
                'id','name','phone','username','password','authorization',
               ])
            )
            
            ->addIndexColumn()
            ->addColumn('action','dashboard.datatable.user-action')
            ->rawColumns(['status', 'action'])
            ->make(true);
        }
        // dd(User::all());
        return view('dashboard.users.list',$data);
    }

    public function create(){

        $data['title'] = 'ADD USER';
        return view('dashboard.users.add-edit', $data);

    }

    public function store(Request $request){
        // dd($request->all());
        $id = $request->userId;
        // dd($request->userId);
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'authorization' => 'required',
            'username'  => 'required',
            'password' => 'nullable'
        ]);

        if(!empty($request->password)){
            $data['password'] = bcrypt($request->get('password'));
        }else{
            unset($data['password']);
        }
        // unset($data['authorization']);
        if (!empty($id)) {
            User::where(array('id' => $id))->update($data);
            return Redirect::to("dashboard/users")->withSuccess("GREAT INFO HAS BEEN UPDATED");
        } else {

            // $data['authorization'] = $request->authorization;
            // $data['created_at'] = date('Y-m-d H:i:s');
            $user_id = User::insertGetId($data);
            return Redirect::to("dashboard/users")->withSuccess("GREAT INFO HAS BEEN CREATED");
        }
    }

    public function edit($id,Request $request){
        // dd($id);
        $data['title'] = 'EDIT USER';
        $data['result'] = User::where('id',$id)
        ->first(['id','name','phone','username','password','authorization']);
        // dd($data['result']);
        return view('dashboard.users.add-edit',$data);

    }

    public function delete($id){
        $user = User::findOrFail($id)->delete();
        return Redirect::to("dashboard/users")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }
}
