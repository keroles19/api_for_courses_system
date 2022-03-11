<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Teacher extends Authenticatable implements JWTSubject
{

    protected $table = 'teachers';
    public $timestamps = true;
    protected $fillable = array('id', 'name', 'password', 'phone');
    protected $hidden = array('password');

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam');
    }

    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon');
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
