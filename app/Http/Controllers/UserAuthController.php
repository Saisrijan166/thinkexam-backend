<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserAuthController extends Controller
{
    public function login(Request $request){

        

        $user = User::where("email",$request->email)->first();
        $hash = Hash::check($request->password,$user->password);
        if(!$user || !$hash){
            return ['result'=>"Invalid credentials"];
        }
        $succes['token'] = $user->createToken('Myapp')->plainTextToken;
        $succes['name'] = $user->name;

        return ['result'=>$succes,'message'=>'User logged in successfully'];
    }

    public function signup(Request $request){
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $succes['token'] = $user->createToken('Myapp')->plainTextToken;
        $succes['name'] = $user->name;

        return ['result'=>$succes,'message'=>'User created successfully'];
    }
}
