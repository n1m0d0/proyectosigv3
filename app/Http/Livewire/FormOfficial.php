<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Official;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class FormOfficial extends Component
{
    use WithPagination;

    public $nombres;
    public $paterno;
    public $materno;
    public $correo;

    public function render()
    {
        $officials = Official::OrderBy('id', 'desc')->paginate(10);
        return view('livewire.form-official', compact('officials'));
    }

    public function addOfficial()
    {
        $this->validate([
            'nombres' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'correo' => 'required|email'
        ]);

        DB::beginTransaction();

        try {

            $official = new Official();
            $official->nombres = $this->nombres;
            $official->paterno = $this->paterno;
            $official->materno = $this->materno;
            $official->save();

            $user = new User();
            $user->official_id = $official->id;
            $user->email = $this->correo;
            $user->password = bcrypt("PNE123###");
            $user->codigo = Str::uuid()->toString();
            $user->activation = 1;
            $user->save();

            $user->assignRole('oficial');
        } catch (\Exception $e) {
            DB::rollback();
        }

        DB::commit();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->clearOfficial();
    }

    public function softDeleteOfficial($id)
    {
        $user = User::where('official_id', $id)->first();
        if ($user->id == 1) {
            session()->flash('alert', 'No se puede eliminar al administrador.');
        } else {
            $user->activation = 0;
            $user->save();
            session()->flash('message', 'Los datos se guardaron correctamente.');
        }
    }

    public function activateOfficial($id)
    {
        $user = User::where('official_id', $id)->first();
        $user->activation = 1;
        $user->save();
        session()->flash('message', 'Los datos se guardaron correctamente.');
    }

    public function clearOfficial()
    {
        $this->reset(['nombres', 'paterno', 'materno', 'correo']);
    }
}
