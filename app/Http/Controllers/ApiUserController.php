<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ApiUserController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * 
     */
    public function register(Request $request)
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            // Create new user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Generate access token
            $accessToken = $user->createToken('authToken')->accessToken;

            // Return success response with access token
            return response()->json([
                'message' => 'Registration successful',
                'access_token' => $accessToken,
            ]);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'message' => 'Registration failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Log in an existing user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        try {
            // Validate the incoming request data.
            // $request->validate([
            //     'email' => 'required|string|email|max:255',
            //     'password' => 'required|string|min:8',
            // ]);

            $user = User::where('email', $request->email)->first();
            if ($user) {
                // Verify the password
                if (Hash::check($request->password, $user->password)) {
                    // Authentication successful
                    Auth::login($user);
                    $token = $user->createToken('auth-token')->plainTextToken;
                    return response()->json([
                        'user' => $user,
                        'access_token' => $token,
                        'message' => 'Login successfully,wait as we redirect you...'
                    ]);
                } else {
                    // Authentication failed
                    return response()->json([
                        'message' => 'Check credentials and try again later.',
                        'error' => "Invalid login credentials.",
                    ], 401); }
            } else {
                // User does not exist in the database
                return response()->json([
                    'message' => 'User does not exist.',
                    'error' => "Kidly create an account::register-->",
                ], 401); }
        } catch (\Exception $e) {
            // Handle the error
            return response()->json([
                'message' => 'Unable to authenticate user',
                'error' => $e->getMessage(),
            ], 401);
        }



    }
}