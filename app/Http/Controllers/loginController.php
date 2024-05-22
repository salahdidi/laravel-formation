<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        
        // $credentials = $request->only('email', 'password');
        $credentials = ['email' => $request->email,
                         'password' => $request->password];

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return "user not found";
        }
        if(!Hash::check($request->password, $user->password)){
            return "wrong password";
        }

        Auth::login($user);

        if (Auth::attempt($credentials)) {
            // Authentication passed, you can redirect or return a success response
            return response()->json(['message' => 'Login successful',
            'token' => csrf_token()], 200);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function register(Request $request)
    {
       
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);
                 



        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201); // Return a success response with the user data
    }
}
