<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model 
{

    protected $table = 'stages';
    public $timestamps = true;
    protected $fillable = array('name', 'photo');

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function cources()
    {
        return $this->hasMany('App\Models\Course');
    }

}