<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiTrait;

    public function login(Request $request) 
    {
        $data = $this->validateRequest($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();
        if (!$user)
        {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        if (!auth()->attempt($data))
        {
            return response()->json([
                'message' => 'Invalid password'
            ], 401);
        }

        $user->accessToken = $user->createToken('accessToken')->plainTextToken;
        return $this->success('Login success', [ 
            'user' => $user
        ]);
    }

    public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout success'
        ]);
    }
}
