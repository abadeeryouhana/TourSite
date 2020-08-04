<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ToursController extends Controller
{

    public function index(Request $request){
        $data['title'] = "TOURS";
        // $query = Tour::with('programs');
        // dd($query);
        if(request()->ajax()){
            // $data['program'] = Tour::with('programs');

            $query1 = Tour::with('images');
            $query2 = Tour::with('programs');
            return datatables()
            ->eloquent($query1, $query2)
            ->addColumn('path', function(Tour $tour){
                    return $tour->images->map(function($gallaries){
                        $url = asset('tourImages/'.$gallaries->path);
                        return '<img style="padding: 3px" src="'.$url.'" width="150" class="img-rounded" align="center" />';
                    })->implode('<br>');
                })
            ->addColumn('program', function(Tour $tour){
                return $tour->programs->map(function ($programs){
                    return $programs->rule;
                })->implode('<br>');
            }) 
            ->addIndexColumn()
            ->addColumn('action','dashboard.datatable.tour-action')
            ->addColumn('status', 'datatable.status')
            ->rawColumns(['status', 'action','path','program'])
            ->make(true);
        }
        
        return view('dashboard.tours.list',$data);
    }

    public function create(){

        $data['title'] = 'ADD TOUR';
        return view('dashboard.tours.add-edit', $data);

    }

    public function store(Request $request){
        // dd($request->all());
        // dd($request->rule);
        $id = $request->tourId;
        $data = $request->validate([
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'startDate'  => 'required',
            'duration'  => 'required',
            'cost'  => 'required',
            'transportationType' => 'required',
            'notes'  => 'nullable',
        ]);

        if (!empty($id)) {
            Tour::where(array('id' => $id))->update($data);
            // Program::where(array('t_id' => $id))->update($program_array);

            $images = array();
            if($files = $request->file('path')){
                //    dd($files);
                foreach($files as $image){
                    $name =time().str_random(10).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('tourImages'), $name);
                    $images[] = $name;

                    Gallery::create([
                        't_id' => $id,
                        'path' => $name
                    ]);
                   
                }
            }
            $rules = $request->rule;
            $rule_records = [];
            if(!empty($rule)){
                foreach($rules as $rule){
                    $rule_records[] = [
                        't_id' => $id,
                        'rule' => $rule
                    ] ;
                }
                    
            }
            Program::insert($rule_records);
            return Redirect::to("dashboard/tours")->withSuccess("GREAT INFO HAS BEEN UPDATED");
        } else {
            
            $tour_id = Tour::insertGetId($data);
            // $item = Tour::create($request->all());
            // dd($tour_id);

            // dd($request['rule']);
            $rules = $request->rule;
            $rule_records = [];
            foreach($rules as $rule){
                if(!empty($rule)){
                    $rule_records[] = [
                        't_id' => $tour_id,
                        'rule' => $rule
                    ] ;
                }
                    
            }
            Program::insert($rule_records);
            
            
            $images = array();
            if($files = $request->file('path')){
                //    dd($files);
                foreach($files as $image){
                    $name =time().str_random(10).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('tourImages'), $name);
                    $images[] = $name;

                    Gallery::create([
                        't_id' => $tour_id,
                        'path' => $name
                    ]);
                   
                }
            }
            return Redirect::to("dashboard/tours")->withSuccess("GREAT INFO HAS BEEN CREATED");
        }
    }

    public function edit($id,Request $request){
        // dd($id);
        $data['title'] = 'EDIT TOUR';
        $data['result'] = Tour::where('id',$id)
        ->first(['id','name','country','city','startDate','duration','cost','transportationType','notes']);
        // dd($data['result']);
        return view('dashboard.tours.add-edit',$data);

    }

    public function updateProgram($id , Request $request){
        // dd($id);
        // $tour_id = $id;
        $data['id'] = $id;
        $data['title'] = 'EDIT PROGRAM';
        $data['result'] = Program::where('id',$id)->first(['id','rule']);
        // dd($data['id']);

        return view('dashboard.program.add-edit',$data);
        

       
    }

    public function delete($id){
        $tour = Tour::findOrFail($id)->images()->delete();
        $program = Tour::findOrFail($id)->programs()->delete();
        $delete = Tour::findOrFail($id)->delete();
        return Redirect::to("dashboard/tours")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }

    public function deleteImage($id){
        $row = Gallery::findOrFail($id)->delete();
        return Redirect::to("dashboard/tours")->withSuccess("GREAT INFO HAS BEEN DELETE");

    }

    public function deleteProgram($id){
        $row = Program::findOrFail($id)->delete();
        return Redirect::to("dashboard/tours")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }

    
}
