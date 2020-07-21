<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'country',
        'city',
        'street',
        'email',
            
    ];

    public function tours(){
        return $this->belongsToMany(Tour::class, 'customer_tours');
    }
}
