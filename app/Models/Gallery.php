<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'path',
        't_id',
            
    ];

    public function tours(){
        return $this->belongsTo(Tour::class, 't_id');
    }
}
