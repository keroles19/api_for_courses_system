<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Student extends Authenticatable implements JWTSubject
{

    protected $table = 'students';
    public $timestamps = true;
    protected $fillable = array('name', 'password', 'phone', 'stage_id');
    protected $hidden = array('password');

    public function Stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }

    public function coupons()
    {
        return $this->belongsToMany('App\Models\Coupon')->withPivot('timer');
    }

    public function cources()
    {
        return $this->belongsToMany('App\Models\Course');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

}
