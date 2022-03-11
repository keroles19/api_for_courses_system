<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\course\CreateCourceRequest;
use App\Http\Requests\Teacher\course\UpdateCourceRequest;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;

class CourserController extends Controller
{

     // return all teacher's course
    public function index(Request $request)
    {
       return responseJson('200','',CourseResource::collection($request->user()->courses));
    }



    // create teacher course
    public function store(CreateCourceRequest $request)
    {
        $course = $request->user()->courses()->create($request->all());
        throw_if(!$course,GeneralException::class,'404');
        return responseJson('200','created successfully',$course);
    }


    public function update(UpdateCourceRequest $request, $id)
    {
        $course = $request->user()->courses()->update($request->all());
        throw_if(!$course,GeneralException::class,'404');

        return responseJson('200','updates  successfully');
    }


    public function show($id)
    {
        $course = auth()->user()->courses()->findOrFail($id);
        throw_if(!$course,GeneralException::class,'404');
        return new CourseResource($course);
    }



    public function destroy($id)
    {
        $course = auth()->user()->courses()->find($id);
        if($course) {
            $course->delete();
            return responseJson('200', 'delete successfully');
        }
        else{
            return responseJson('200','Invalid Id');
        }
    }


}
