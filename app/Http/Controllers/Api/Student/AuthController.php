<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Api\MainProcess\AuthTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\Student\RegisterStudent;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    use AuthTrait;

    private $guard = 'student_api';

    public function login(ApiLoginRequest $request): \Illuminate\Http\JsonResponse
    {
       return  $this->loginToSystem($request,$this->guard);
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
       return $this->logoutSystem($request);
    }
    public function register(RegisterStudent $request): \Illuminate\Http\JsonResponse
    {

        return $this->newModel($request,$this->guard);





    }
}
