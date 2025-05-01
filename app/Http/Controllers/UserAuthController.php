<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserAuthController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="User login",
     *     tags={"Login"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="sai@gmail.com"),
     *             @OA\Property(property="password", type="string", format="password", example="123456")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User logged in successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", type="object",
     *                 @OA\Property(property="token", type="string", example="token_here"),
     *                 @OA\Property(property="name", type="string", example="John Doe")
     *             ),
     *             @OA\Property(property="message", type="string", example="User logged in successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Invalid credentials",
     *         @OA\JsonContent(@OA\Property(property="result", type="string", example="Invalid credentials"))
     *     )
     * )
     */
    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = $this->user->where("email", $validatedData['email'])->first();

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

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     summary="User logout",
     *     tags={"Login"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Logged out successfully",
     *         @OA\JsonContent(@OA\Property(property="message", type="string", example="Logged out successfully"))
     *     )
     * )
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function signup(Request $request)
    {
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = $this->user->create($input);
        $succes['token'] = $user->createToken('Myapp')->plainTextToken;
        $succes['name'] = $user->name;

        return ['result' => $succes, 'message' => 'User created successfully'];
    }
}
