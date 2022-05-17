<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($cred)) {
            $user = Auth::user();
            $token = $user->createToken('user_token')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Your credential dont match']);
    }
}
