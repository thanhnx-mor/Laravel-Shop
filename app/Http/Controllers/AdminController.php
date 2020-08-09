<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->to('home');
        }
        return view('login.index');
    }

    public function login(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials, $remember)) {
            return redirect()->to('home');
        } else {
            return redirect()->to('/');
        }
    }
}
