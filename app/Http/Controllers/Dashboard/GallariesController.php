<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GallariesController extends Controller
{
    public function index(Request $request){
        $data['title'] = "GALLARIES";
        // dd($query);
        // ->selectRaw
        if(request()->ajax()){
            $query = Tour::with('images');
        // dd($query);

            return datatables()->eloquent($query)
            ->addColumn('path', function(Tour $tour){
                    return $tour->images->map(function($gallaries){
                        return str_limit($gallaries->path);
                    })->implode('<br>');
                })
                ->addColumn('name',function(Tour $tour){
                    return $tour->images()->map(function ($gallaries){
                        return str_limit($gallaries->t_id);
                    })->implode('<br>');
                })
                ->addIndexColumn()
                ->addColumn('action','dashboard.datatable.tour-action')
                ->addColumn('status', 'datatable.status')
                ->rawColumns(['status', 'action'])
                ->make(true);

        }
        // return datatables()->eloquent($query)
        // ->addColumn('path', function(Tour $tour){
        //     return $tour->images->map(function($gallaries){
        //         return str_limit($gallaries->path);
        //     })->implode('<br>');
        // })
        // ->addIndexColumn()
        // ->addColumn('action','dashboard.datatable.tour-action')
        // ->addColumn('status', 'datatable.status')
        // ->rawColumns(['status', 'action'])
        // ->make(true);
           
            

        // $tours = $user->products()
        // if(request()->ajax()){
        //     $model = Tour::with('gallaries');
        //     // dd($model);
        //     // return datatables()->eloquent($model)
        //     // ->addColumn('gallaries', function(Tour $tour){
        //     //     return $tour->images->path;
        //     // })
        //     // ->toJson()

       
        //     ->addColumn('gallaries', function(Tour $tour){
        //         return $tour->images->path;
        //     })
       
        //     ->addIndexColumn()
        //     // ->addColumn('tours', function(Gallery $gallery){
        //     //     return $gallery->tours->
        //     // })
        //     ->addColumn('action','dashboard.datatable.tour-action')
        //     // ->addColumn('status', 'datatable.status')
        //     ->rawColumns('action')
        //     ->make(true);
        // }


        // dd(Gallery::all());
        return view('dashboard.gallaries.list',$data);
    }
}
