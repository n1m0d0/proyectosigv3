<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            if(auth()->user()->activation == 1) {
                if(auth()->user()->person_id != null)
                {
                    return redirect()->route('data.person');
                } else {
                    if(auth()->user()->institution_id != null)
                    {
                        return redirect()->route('data.institution');
                    } else {
                        if(auth()->user()->official_id != null)
                        {
                            return redirect()->route('page.dashboard');
                        }
                    }
                }
                //return redirect()->intended('dashboard');
            }
            return back()->withErrors([
                'email' => 'Cuenta no activada',
            ]); 

        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros. ',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }

    public function updatePassword()
    {
        return view('pages.updatePassword');
    }
}
