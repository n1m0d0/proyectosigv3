<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ApiRegisterInstitutionController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'razonSocial' => 'required',
            'nombreComercial' => 'required',
            'society' => 'required',
            'nit' => 'required',
            'email' => 'required|email',
            'password' => 'required'
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
            return response()->json([
                'code' => '400',
                'status' => 'error',
                'message' => 'El correo ya esta en uso'
            ], 200);
        }

        DB::commit();

        return response()->json([
            'code' => '200',
            'status' => 'succesful',
            'message' => "Usuario Registrado Correctamente"
        ], 200);
    }
}
