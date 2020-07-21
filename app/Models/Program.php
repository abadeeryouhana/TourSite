<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'rule',
        't_id',
            
    ];

    public function tours(){
        return $this->belongsTo(Tour::class, 't_id');
    }
}
