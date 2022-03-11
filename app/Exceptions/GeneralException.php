<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralException extends Exception
{
    public function render(Request $request): JsonResponse
    {

        return new JsonResponse([
           'errors'=>[
               'message'=> $this->getMessage(),
           ]
        ],404);
    }
}
