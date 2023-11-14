<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends Controller
{
    //

    public function index()
    {
        return Inertia::render('Auth/Login');
    }

     public function store(Request $request)
    {
        /**
         * validate request
         */
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ], [
            'email.required' => 'Silahkan Isi email',
            'password.required' => 'Silahkan Isi password'
        ]);

        //get email and password from request
        $credentials = $request->only('email', 'password');

        //attempt to login
        if (Auth::attempt($credentials)) {

            //regenerate session
            $request->session()->regenerate();

            //redirect route dashboard
            return redirect('/dashboard');
        }

        //if login fails
        return redirect('login')->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }
}
