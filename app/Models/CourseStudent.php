<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model 
{

    protected $table = 'course_student';
    public $timestamps = true;
    protected $fillable = array('course_id', 'student_id');

}