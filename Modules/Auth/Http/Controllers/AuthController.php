<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth::login');
    }


    public function getRegister()
    {
        return view('auth::register');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user  = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('blog.index');
        }
        return redirect()->back()->with('error', 'Invalid credentials');

    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user  = User::where('email', $data['email'])->first();
        if(!$user)
        {
            User::create($data);
            return redirect()->route('blog.index');
        }
        return redirect()->back()->with('error', 'User already exists');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }

}
