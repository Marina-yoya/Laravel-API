<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
   
    // public function register(Request $request)
    // {
        
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|string|min:6',
    //     ]);

        
    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->password = bcrypt($request->input('password'));
    //     $user->save();

      
    //     return response()->json(['message' => 'User registered successfully'], 201);
    // }

//

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $user = User::where('email', $request->input('email'))->first();

    if ($user) {
        return response()->json(['message' => 'Email already in use'], 422);
    }

    $newUser = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    return response()->json(['message' => 'User registered successfully'], 201);
}



}