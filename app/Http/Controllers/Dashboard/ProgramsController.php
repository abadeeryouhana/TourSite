<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProgramsController extends Controller
{
    public function index(){
        $data['title'] = 'PROGRAMS';
        // $query = Program::with('tours');
        // dd($query->get());
        if(request()->ajax()){
            $query = Program::with('tours');
            return datatables()
            ->eloquent($query)
            ->addColumn('tours', function(Program $program){
                return $program->tours->name;
                
            })
            ->addIndexColumn()
            ->addColumn('action','dashboard.datatable.program-action')
            ->rawColumns(['status','action','tours'])
            ->make(true);
        }

        return view('dashboard.program.list',$data);
    }

    public function store(Request $request){
        // dd($request->all());
        $id = $request->programId;
        // dd($id);
        $data = $request->validate([
            'rule' => 'required',
            // 't_id' => 'required'
        ]);
        if(!empty($id)){
            Program::where(array('id' => $id))->update($data);
            // dd('asd');
        }
        // $program_id = Program::insertGetId($data);
        return Redirect::to("dashboard/tours")->withSuccess("GREAT INFO HAS BEEN UPDATED");

    }

    public function edit($id,Request $request){
        // dd($id);
        // $data['id'] = $id;
        $data['title'] = 'EDIT PROGRAM';
        $data['result'] = Program::where('id',$id)->first(['id','rule']);
        // dd($data['id']);

        return view('dashboard.program.add-edit',$data);

    }

    public function delete($id){
        $program = Program::findOrFail($id)->delete();
        return Redirect::to("dashboard/programs")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }
}
