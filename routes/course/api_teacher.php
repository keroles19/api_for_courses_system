<?php


## teacher authentication
use App\Http\Controllers\Api\Teacher\AuthController;
use App\Http\Controllers\Api\Teacher\CouponController;
use App\Http\Controllers\Api\Teacher\CourserController;
use App\Http\Controllers\Api\Teacher\ExamController;

Route::prefix('teacher')->group(function (){

    Route::controller(AuthController::class)->group(function () {

        Route::get('login','login');
        Route::post('register','register');
        Route::post('logout','logout');

         ## must have token
        ##deal with auth profile by  token
        Route::middleware('auth.guard:teacher_api')->group(function(){
            Route::post('logout','logout');
        });
    });

      ## coursers route for teacher deal with its
    Route::apiResource('course', CourserController::class)->middleware('auth.guard:teacher_api');
    ## exames route for teacher deal with its
    Route::apiResource('exam', ExamController::class)->middleware('auth.guard:teacher_api');
    ## coupons route for teacher deal with its
    Route::apiResource('coupon', CouponController::class)->middleware('auth.guard:teacher_api');





});
