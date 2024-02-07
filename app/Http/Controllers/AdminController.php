<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'deviceName' => 'required',
        ]);
        extract($request->all(), EXTR_OVERWRITE);
        $user = User::where('email', $email)->first();
     
        if (! $user || ! Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sai tài khoản hoặc mật khẩu'
            ]);
        }
     
        return response()->json([
            'status' => 'success',
            'token' => $user->createToken($deviceName)->plainTextToken,
        ]);
    }
    public function logout(Request $request){
        
    }
}
