<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return response()->json(compact('users'));
    }
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     $user = Auth::user();
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return response()->json([
    //             'message' => 'Logged In successfully',
    //             'users' => $user
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => 'Invalid Email Or Password',
    //         ]);
    //     }
    // }

    public function login(Request $request)
    {
        $user = User::where('email',  $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => ['Username or password incorrect'],
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'name' => $user->name,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);
        // dd($request);

        $tenant = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return response()->json([
            'message' => 'User Registered Successfully',
            'user' => $tenant,
        ]);
    }
}
