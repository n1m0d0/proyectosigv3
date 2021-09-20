<?php

namespace App\Http\Controllers;

use App\models\User;
use App\Models\Society;
use App\Models\Institution;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterInstitutionController extends Controller
{
    public function institution()
    {
        $institution = Institution::find(auth()->user()->institution_id);
        return view('pages.dataInstitution', compact("institution"));
    }

    public function register()
    {
        $societies = Society::all();
        return view('pages.registerInstitution', compact('societies'));
    }

    public function store(Request $request)
    {
        $rules = [
            'razonSocial' => 'required',
            'nombreComercial' => 'required',
            'society' => 'required',
            'nit' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $institution = new Institution();
            $institution->razon_social = $request->razonSocial;
            $institution->nombre_comercial = $request->nombreComercial;
            $institution->society_id = $request->society;
            $institution->nit = $request->nit;
            $institution->save();

            $user = new User();
            $user->institution_id = $institution->id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->codigo = Str::uuid()->toString();
            $user->activation = 1;
            $user->save();

            $user->assignRole('empresa');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->intended('/')->with("alert", "El correo ya esta en uso");
        }

        DB::commit();

        return redirect()->intended('/')->with("message", "Registrado correctamente");
    }
}
