<?php

namespace App\Http\Controllers\Api\MainProcess;

use App\Exceptions\GeneralException;
use App\Http\Requests\Teacher\RegisterTeacher;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AuthTrait
{


    // create new model
    public function newModel($request,$guard){

        try {
            $request->merge(["password" => bcrypt($request->password)]); // hash password
            if($guard == 'teacher_api')
                Teacher::create($request->all());
            else
                Student::create($request->all());
            return responseJson('200','successfully register');
        }
        catch (\Exception $e){
            return responseJson('4040','something error');
        }



    }



         // login to system
    public function loginToSystem($request ,$guard): \Illuminate\Http\JsonResponse
    {
        ///login and get  token
        $token = Auth::guard($guard)->attempt($request->only(['name','password']));
        // return incorrect credential
        throw_if(!$token,GeneralException::class,'incorrect credential');
        // correct credential
        $model = Auth::guard($guard)->user();
        $model->api_token = $token;
        return responseJson('200','',$model);
    }

    // logout from system
    public function logoutSystem($request): \Illuminate\Http\JsonResponse
    {
        // get token from header
        $token = $request->header('api_token');
        throw_if(!$token,GeneralException::class,'must type token');
        // remove token -- logout
        JWTAuth::setToken($token)->invalidate();
        return responseJson('200','successfully logout');
    }

//    // register new user
//    public function registerModel($request , $guard){
//
//        $model =
//
//
//    }

}
