<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'photo' => $this->photo,
            'stage'=>$this->stage,
            'teacher'=>$this->teacher,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'exam'=>$this->exam
        ];
    }


}
