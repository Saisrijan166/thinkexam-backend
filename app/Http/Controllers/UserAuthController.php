<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserAuthController extends Controller
{
    public function login(Request $request){

        
$validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
    ]);

    $user = User::where("email", $validatedData['email'])->first();

    if (!$user || !Hash::check($validatedData['password'], $user->password)) {
        return response()->json(['result' => "Invalid credentials"], 401); 
    }

    $success['token'] = $user->createToken('Myapp')->plainTextToken;
    $success['name'] = $user->name;

    return response()->json([
        'result' => $success,
        'message' => 'User logged in successfully'
    ], 200);
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
