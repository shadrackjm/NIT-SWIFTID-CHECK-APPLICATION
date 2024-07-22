<?php

namespace App\Http\Resources;

use App\Models\Student;
use App\Models\StudentFee;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamDetails extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image ? asset('images/'.$this->image.'') : '',
            'reg_number' => $this->reg_number,
            'exam_data' => StudentFee::where([['user_id',$this->id],['semester',1]])->first(),
            'student_data' => $this->StudentResource(Student::where('user_id',$this->id)->first()),
        ];
    }

    function StudentResource(Student $student){
        $data = new StudentResource($student);
        return $data;
    }
}
