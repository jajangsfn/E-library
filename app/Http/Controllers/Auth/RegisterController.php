<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        /**
         * validate request
         */
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|confirmed',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'Silahkan Isi Nama',
            'email.required' => 'Silahkan Isi email',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Silahkan Isi Password',
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation' => 'Silahkan Isi Password'
        ]);
        /**
         * create user
         */
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        //redirect
        return redirect('/login')->with('status', 'Register Berhasil!');
    }
}
