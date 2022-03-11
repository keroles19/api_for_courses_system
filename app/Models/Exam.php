<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model 
{

    protected $table = 'exames';
    public $timestamps = false;
    protected $fillable = array('code', 'course_id', 'teacher_id', 'url');

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

}