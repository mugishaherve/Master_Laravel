<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([

            'email' => 'required|email',
            'password' => 'required|string'
            
        ]);

        if(auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('customers');
        }

        return back()->withErrors([
            'email' => 'The email adress provided is wrong!',
            'password' => 'The password provided is invalid'
            
        ]);
        
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}