<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'code'=>$this->code,
            'start_date'=> $this->start_date,
            'end_date'=> $this->end_date,
            'course'=> $this->course,
            'teacher' =>$this->teacher,
            'timer'=>$this->timer
        ];
    }
}
