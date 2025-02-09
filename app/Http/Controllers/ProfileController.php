<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user(); 
        return response()->json($user);
    }

    
    public function resetPassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:6',
    ]);

    try {
        $user = $request->user(); 
        $user->password = bcrypt($request->password); 
        $user->save();

        return response()->json(['message' => 'Password reset successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to reset password.'], 500);
    }
}

}
