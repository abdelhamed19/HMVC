<?php

namespace Modules\Auth\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'These credentials do not match our records.']);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token,'user' => $user]);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            return response()->json(['message' => 'User Already Exists']);
        }
        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token,'user' => $user]);
    }
}
