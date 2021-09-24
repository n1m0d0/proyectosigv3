<?php

namespace Database\Seeders;

use App\Models\Official;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $official = new Official();
        $official->nombres = "admin";
        $official->paterno = "admin";
        $official->materno = "admin";
        $official->save();

        $user = new User();
        $user->official_id = $official->id;
        $user->email = "admin@sigv3.com";
        $user->codigo = Str::uuid()->toString();
        $user->activation = 1;
        $user->password = bcrypt("515t3m45");
        $user->save();

        $user->assignRole('admin');

        $official = new Official();
        $official->nombres = "oficial";
        $official->paterno = "oficial";
        $official->materno = "oficial";
        $official->save();

        $user = new User();
        $user->official_id = $official->id;
        $user->email = "oficial@sigv3.com";
        $user->codigo = Str::uuid()->toString();
        $user->activation = 1;
        $user->password = bcrypt("0f1c14l");
        $user->save();

        $user->assignRole('oficial');

        $official = new Official();
        $official->nombres = "responsable";
        $official->paterno = "responsable";
        $official->materno = "responsable";
        $official->save();

        $user = new User();
        $user->official_id = $official->id;
        $user->email = "responsable@sigv3.com";
        $user->codigo = Str::uuid()->toString();
        $user->activation = 1;
        $user->password = bcrypt("r35p054bl3");
        $user->save();

        $user->assignRole('responsable');

        $official = new Official();
        $official->nombres = "fiduciario";
        $official->paterno = "fiduciario";
        $official->materno = "fiduciario";
        $official->save();

        $user = new User();
        $user->official_id = $official->id;
        $user->email = "fiduciario@sigv3.com";
        $user->codigo = Str::uuid()->toString();
        $user->activation = 1;
        $user->password = bcrypt("f1duc14r10");
        $user->save();

        $user->assignRole('fiduciario');
    }
}
