<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamDetails;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudentData(){
        $user = User::where('id',auth()->user()->id)->first();
        $user_details = new ExamDetails($user);
        return response()->json(['user' => $user_details],200);
    }

    public function getSpecificStudent(Request $request){
        

        try {
            $request->validate([
                'reg_number' => 'required'
            ]); 

            $user = User::where('reg_number',$request->reg_number)->first();
            $user_details = new ExamDetails($user);
            return response()->json(['user' => $user_details],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()],422);
        }

        
    }

}
