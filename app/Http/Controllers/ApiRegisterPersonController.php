<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiRegisterPersonController extends Controller
{
    public function index()
    {
        return "HOLA";
    }

    public function store(Request $request)
    {
        $rules = [
            'nombres' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $person = new Person();
            $person->nombres = $request->nombres;
            $person->paterno = $request->paterno;
            $person->materno = $request->materno;
            $person->save();

            $user = new User();
            $user->person_id = $person->id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->codigo = Str::uuid()->toString();
            $user->activation = 1;
            $user->save();


            //Mail::to($request->email)->send(new Confirmation($user));

            $user->assignRole('persona');
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
