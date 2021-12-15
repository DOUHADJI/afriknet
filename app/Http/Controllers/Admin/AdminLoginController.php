<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>'logout']);
    }

    public function index (){
        return view ('admin.login');
    }


    public function login(Request $request)
    {
        

        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if ( Auth::guard('admin')->attempt($credentials )  ) {
            $request->session()->regenerate();

            return redirect()->intended("dashboard");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
