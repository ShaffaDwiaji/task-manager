<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\api\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\ApiResource;

class AuthController extends Controller
{
    // Login Function
    public function Login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return new ApiResource(
                401, "Login Gagal", false, 
            );
        }

        $token = $user->createToken('auth-token', 
            $user->getAllPermissions()->pluck('name')->toArray())->plainTextToken;
        return new ApiResource(
            ['token' => $token],'Login Berhasil',true
        );
    }
    
    // Logout Function
    public function Logout(Request $request) 
    {
        $request->user()->tokens()->delete();
        return new ApiResource(
            null, "Logout Berhasil", true,        
        );
    }
}


