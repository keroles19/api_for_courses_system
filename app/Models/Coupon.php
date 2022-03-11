<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('code', 'start_date', 'end_date','timer', 'cource_id', 'teacher_id');

    public function students()
    {
        return $this->belongsToMany('App\Models\Student')->withPivot('timer');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

}
