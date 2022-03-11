<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model 
{

    protected $table = 'courses';
    public $timestamps = true;
    protected $fillable = array('name', 'url', 'photo', 'teacher_id', 'stage_id');

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }

    public function exam()
    {
        return $this->hasOne('App\Models\Exam');
    }

    public function coupon()
    {
        return $this->hasOne('App\Models\Coupon');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

}