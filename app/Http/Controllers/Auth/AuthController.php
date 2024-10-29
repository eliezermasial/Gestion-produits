<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Services\ServiceUserInterface;

class AuthController extends Controller
{
    public function login ()
    {
        return view('connexion.login');
    }

    public function dologin (UserRequest $request, ServiceUserInterface $serviceDologin)
    {
        
        $validateRequest = $request->validated();

        $serviceDologin->dologinUser($validateRequest, $request);
       
        return to_route('login')->withErrors([
            'email'=>'email non valide', 'password'=>'password non valide'
        ]);
    }

    public function logout (ServiceUserInterface $serviceLogout)
    {
        $serviceLogout->logoutUser();
        
        return to_route('dashboard')->with('success', 'vous n\'est plus connecté');
    }
}
