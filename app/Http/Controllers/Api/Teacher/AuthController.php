<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Api\MainProcess\AuthTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\Student\RegisterStudent;
use App\Http\Requests\Teacher\RegisterTeacher;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    use AuthTrait;

    private $guard = 'teacher_api';

    public function login(ApiLoginRequest $request): \Illuminate\Http\JsonResponse
    {
       return  $this->loginToSystem($request,$this->guard);
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
       return $this->logoutSystem($request);
    }
    public function register(RegisterTeacher $request): \Illuminate\Http\JsonResponse
    {

        return $this->newModel($request,$this->guard);





    }
}
