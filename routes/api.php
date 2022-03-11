<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::group(['nameSpace'=>'Api','prefix'=>'v1','middleware'=>['auth:api','jwt.verify']] , function() {
//
//
//});

Route::middleware('accept.json')
       ->prefix('v1')
       ->group(function(){

        // include  api teacher  file
        require __DIR__ . '/course/api_teacher.php';
        //  include api student file
        require_once __DIR__ .'/course/api_student.php';

    });





//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
