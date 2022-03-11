<?php

if(!function_exists('responseJson')){
    function responseJson($code,$msg,$data = null ): \Illuminate\Http\JsonResponse
    {
        return response()->json([
          'code' => $code,
          'msg' =>$msg ,
          'data' => $data
        ]);
    }
}
