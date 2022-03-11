<?php
## teacher authentication
use App\Http\Controllers\Api\Student\AuthController;
use App\Http\Controllers\Api\Student\StudentController;

Route::prefix('student')->group(function (){

    Route::controller(AuthController::class)->group(function () {

        Route::get('login','login');
        Route::post('register','register');
        Route::post('logout','logout');

        //deal with auth profile by  token
        Route::middleware('auth.guard:student_api')->group(function(){
            Route::post('logout','logout');
        });
    });
          ## main process for student
    Route::middleware('auth.guard:student_api')->group(function(){
        Route::get('courses',[StudentController::class,'getCourseStage']);
        Route::get('my_courses',[StudentController::class,'myCourse']);
        Route::post('use_coupon',[StudentController::class,'registerCourseByCoupon']);

    });


});
