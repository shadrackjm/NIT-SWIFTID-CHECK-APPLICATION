<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'reg_number' => 'required|unique:users',
            'password' => 'required|min:4|max:10|confirmed'
        ]);

        try {

            $registerUser = new User;
            $registerUser->name = $request->name;
            $registerUser->email = $request->email;
            $registerUser->reg_number = $request->reg_number;
            $registerUser->password = Hash::make($request->password);
            $registerUser->save();

            return response()->json(['user' => $registerUser,'token' => $registerUser->createToken($request->reg_number)->plainTextToken],200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()],201);
        }
    }

    public function login(Request $request){

        try {
            $request->validate([
                'reg_number' => 'required',
                'password' => 'required|min:4|max:10'
            ]);
        if (!Auth::attempt($request->only('reg_number','password'))) {
            return response()->json(['message'=>'user not found'],403);
        }
        return response()->json([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken($request->reg_number)->plainTextToken,
        ],200);
        }catch (\Exception $e) {
            return response()->json(['message'=> $e->getMessage()],203);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'successfully logout'
        ],200);
    }

}
