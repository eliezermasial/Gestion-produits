<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login ()
    {
        return view('connexion.login');
    }

    public function dologin (UserRequest $request)
    {
        $validateRequest = $request->validated();
        if(Auth::attempt($validateRequest))
        {
            $request->session()->regenerate();

            return redirect($request->session()->get('url.intended', route('dashboard')));
        }
       
        return to_route('login')->withErrors([
            'email'=>'email non valide', 'password'=>'password non valide'
        ]);
    }

    public function logout ()
    {
        auth::logout();

        return to_route('dashboard')->with('success', 'vous n\'est plus connecté');
    }
}
