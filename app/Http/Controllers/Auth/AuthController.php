<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function attempt(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember = $request->has('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return redirect()->back()
                ->with('fail', 'These credentials does not match.')
                ->withInput();
        }

        return redirect('dashboard');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed']
        ]);

        $credentails = array_merge($request->all(), [
           'password' => bcrypt($request->input('password')),
        ]);

        User::create($credentails);

        return redirect('auth/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('auth/login');
    }
}