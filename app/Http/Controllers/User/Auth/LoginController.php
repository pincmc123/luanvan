<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {

            if(Auth::user()&&Auth::user()->role=='admin')
            {
                return redirect()->route('homeadmin');
            }
            elseif (Auth::user()&&Auth::user()->role=='user')
            {
                return redirect()->route('homeuser');
            }
            else
            {
                return view('Admin.login');
            }
        }

        $credentials = $request->only(['email', 'password']);

       if (Auth::attempt($credentials))
       {
           if(Auth::user()->role=='admin')
           {
               return redirect()->route('homeadmin');
           }
           else
           {
               return redirect()->route('homeuser');
           }
        }
       else
       {
           return back()->with([
               'message' => 'Tài Khoản hoặc mật khẩu sai.',
           ]);
       }
    }
    public function logout(Request $request)
    {
        $role = Auth::user()->role;
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
            if ($role=='admin')
                 return redirect()->route('login');
            else
                 return redirect()->route('homeuser');
    }

}
