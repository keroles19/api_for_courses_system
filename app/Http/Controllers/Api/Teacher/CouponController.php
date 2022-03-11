<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;

use App\Http\Requests\Teacher\Coupon\CreateCouponRequest;
use App\Http\Requests\Teacher\Coupon\UpdateCouponRequest;
use App\Http\Resources\CouponResourse;
use App\Http\Resources\CourseResource;
use App\Http\Resources\ExamResourse;
use Illuminate\Http\Request;

class CouponController extends Controller
{




    // return all teacher's course
    public function index(Request $request)
    {
        return responseJson('200','',CouponResourse::collection($request->user()->coupons));
    }



    // create teacher course
    public function store(CreateCouponRequest  $request)
    {
        $model = $request->user()->coupons()->create($request->all());
        throw_if(!$model,GeneralException::class,'404');
        return responseJson('200','created successfully',new CouponResourse($model));
    }


    /**
     * @throws \Throwable
     */
    public function update(UpdateCouponRequest $request, $id)
    {
        try {
            $model = $request->user()->coupons()->update($request->all());
            return responseJson('200','updates  successfully');
        }
        catch (\Exception $e)
        {
            return responseJson('500',$e->getMessage());
        }

    }


    public function show($id)
    {
        $model = auth()->user()->coupons()->findOrFail($id);
        throw_if(!$model,GeneralException::class,'404');
        return new CouponResourse($model);
    }



    public function destroy($id)
    {
        $course = auth()->user()->coupons()->find($id);
        if($course) {
            $course->delete();
            return responseJson('200', 'delete successfully');
        }
        else{
            return responseJson('200','Invalid Id');
        }
    }
}
