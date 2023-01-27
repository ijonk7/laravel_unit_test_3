<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
