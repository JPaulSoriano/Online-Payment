<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'phone',
        'email',
        'stud_no',
        'period_id',
        'semester_id',
        'course_id',
        'year_id',
        'method_id',
        'payment_ref',
        'image',
        'for',
        'amount',
        'auth_firstname',
        'auth_lastname',
        'auth_middlename',
        'status',
        'ref_no'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function period(){
        return $this->belongsTo('App\Period');
    }

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

    public function year(){
        return $this->belongsTo('App\Year');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }

    public function method(){
        return $this->belongsTo('App\Method');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->middlename}";
    }

    public function getAuthFullNameAttribute()
    {
        return "{$this->auth_lastname}, {$this->auth_firstname} {$this->auth_middlename}";
    }
}
