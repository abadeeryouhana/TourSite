<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\Pivot;


class Customer_tour extends Model
{
    //
        protected $fillable = [
        'c_id',
        't_id',
        'numberOfPassengers',
        'dateOfbooking',
        'totalCost',
        'progress',
        'code'
            
    ];
        public function tours(){
           return $this->belongsTo(Tour::class, 't_id');
        }
         public function customers(){
           return $this->belongsTo(Customer::class, 'c_id');
        }

}
