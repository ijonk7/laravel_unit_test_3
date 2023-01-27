<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        Auth::attempt($request->only('email', 'password'));
        // dd(Auth::user());

        return redirect(RouteServiceProvider::HOME);
    }
}
