<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id ' => $this->user_id,
            'study_level' => $this->study_level,
            'gender' => $this->gender ,
            'date_birth' => $this->date_birth,
            'programme' => $this->programme,
            'study_year' => $this->study_year,
            'current_semister' => $this->current_semister,
            'department' => $this->department ? $this->department : '',
        ];
    }
}
