<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login_admin(){
        // dd(Hash::make(123456));
        // dd(Auth::check());
        if (Auth::check() && Auth::user()->is_admin == 1) {    //check if there is login session made
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    
    public function auth_login_admin(Request $request){
       
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'is_admin' => 1], $remember)) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error', 'Email or Password is incorrect');
        }

    }

    public function logout_admin(Request $request){
        Auth::logout();
        return redirect()->route('login_admin');
    }
    

    

}
