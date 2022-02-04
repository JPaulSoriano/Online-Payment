<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function registrations(){
        return $this->hasMany('App\Registration');
    }
}
