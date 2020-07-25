<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'name',
        'country',
        'city',
        'startDate',
        'duration',
        'cost',
        'transportationType',
        'notes'

        
    ];

    public function images(){
        return $this->hasMany(Gallery::class,'t_id');
    }

    public function programs(){
        return $this->hasMany(Program::class,'t_id');
    }    

    public function customers(){
        return $this->belongsToMany(Customer::class, 'customer_tours');
    }
}
