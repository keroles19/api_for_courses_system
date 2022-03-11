<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\exam\CreateExamRequest;
use App\Http\Requests\Teacher\exam\UpdateExamRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\ExamResourse;
use Illuminate\Http\Request;

class ExamController extends Controller
{


    // return all teacher's course
    public function index(Request $request)
    {
        return responseJson('200','', ExamResourse::collection($request->user()->exams));
    }



    // create teacher course
    public function store(CreateExamRequest $request)
    {
        $exam = $request->user()->exams()->create($request->all());
        throw_if(!$exam,GeneralException::class,'404');
        return responseJson('200','created successfully',$exam);
    }


    /**
     * @throws \Throwable
     */
    public function update(UpdateExamRequest $request, $id)
    {
        try {
             $request->user()->exams()->update($request->all());
            return responseJson('200','updates  successfully');
        }
        catch (\Exception $e)
        {
            return responseJson('500','something error');
        }

    }


    public function show($id)
    {
        $exam = auth()->user()->exams()->findOrFail($id);
        throw_if(!$exam,GeneralException::class,'404');
        return new CourseResource($exam);
    }



    public function destroy($id)
    {
        $exam = auth()->user()->exams()->find($id);
        if($exam) {
            $exam->delete();
            return responseJson('200', 'delete successfully');
        }
        else{
            return responseJson('200','Invalid Id');
        }
    }
}
