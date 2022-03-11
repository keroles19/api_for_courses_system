<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\RegisterCoupon;
use App\Http\Resources\CourseResource;
use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class StudentController extends Controller
{

     ## show all courser with your stage for student
    public function getCourseStage(){
        $course =
         Course::whereHas('Stage',function ($q){
             $q->where('stages.id',auth()->user()->Stage->id);
         })->get();
         return responseJson('200','',CourseResource::collection($course));
    }

    ## get student course
    public function myCourse(): \Illuminate\Http\JsonResponse
    {
        $course = auth()->user()->cources;
        return responseJson('200','',CourseResource::collection($course));
    }

    ## use coupon in register to course

    /**
     * @throws \Exception
     */
    public function registerCourseByCoupon(RegisterCoupon $request): \Illuminate\Http\JsonResponse
    {

             // check invalid coupon
           $invalid = $this->checkInvalidCoupon($request);
           if($invalid['count'] > 0){
               // check used coupon
               $used = $this->checkUsedByUser($invalid['id']);
               $registered = $this->checkCourseAlreadyRegisterd($request->course_id);
           if($used['count'] > 0 || $registered > 0){
               // check count that user used coupon
                return $this->checkTimer($used['timer'],$invalid['timer'],$used['id']);
           }
           else{
               return  $this->registerCoupon($invalid['id'],$request->course_id);
           }
           }
           else{
               return responseJson('','invalid coupon');
           }
    }

    // check invalid coupon with course
    private function checkInvalidCoupon($request): array
    {
        $count =  Coupon::where('code',$request->coupon_id)->where('cource_id',$request->course_id);
        $id =  ($count->count() > 0) ? $count->first()->id : 0;
        $timer =  ($count->count() > 0) ? $count->first()->timer : 0;
         return [
             'count'=>$count->count(),
              'id'=> $id,
              'timer'=>$timer
         ];
    }
    // check if user register by coupon at one or no
    private function checkUsedByUser($id)
    {
        $count =  auth()->user()->coupons()->where('coupon_id', $id);
        $timer  =  $count->count() > 0 ? $count->first()->pivot->timer : 0;
        $id =  ($count->count() > 0) ? $count->first()->id : 0;

        return [
            'count'=>$count->count(),
            'timer'=>$timer,
            'id' =>$id
        ];
    }
    // check if user already registed in course
    private function checkCourseAlreadyRegisterd($id)
    {
        return auth()->user()->cources()->where('course_id', $id)->count();
    }


    // check timer that user entered by coupon
    private function checkTimer($enterTimer,$couponTimer,$couponId){
        if($enterTimer >= $couponTimer){
            return responseJson('404','you have arrived the max number for  using this coupon');
        }
        else{
            $newTim = ++ $enterTimer;

            auth()->user()->coupons()->updateExistingPivot($couponId,['timer'=> $newTim ]);
            return responseJson('','you have been already registered');
        }
    }




     // register coupon
    private function registerCoupon($couponId,$courseId){
            try {
               DB::transaction(function () use($couponId,$courseId){
                   auth()->user()->coupons()->attach($couponId);
                   auth()->user()->cources()->attach($courseId);
               });
                return responseJson('','congratulations ');
            }
            catch (\Exception $e){
                throw new \Exception($e->getMessage(),$e->getCode());
            }
      }






}
