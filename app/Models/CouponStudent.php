<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponStudent extends Model
{

    protected $table = 'coupon_student';
    public $timestamps = false;
    protected $fillable = array('student_id', 'coupon_id','timer');

}
