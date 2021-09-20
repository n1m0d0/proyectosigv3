<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class FromPassword extends Component
{
    public $claveAnterior;
    public $claveNueva;
    public $verificacion;

    public function render()
    {
        return view('livewire.from-password');
    }

    public function updatePassword()
    {
        $this->validate([
            'claveAnterior' => 'required',
            'claveNueva' => 'required',
            'verificacion' => 'required'
        ]);
        if ($this->claveNueva == $this->verificacion) {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            if (Hash::check($this->claveAnterior, $user->password)) {
                $user->password = bcrypt($this->claveNueva);
                $user->save();
                
                session()->flash('message', 'Los datos se guardaron correctamente.');
            }
        } else {
            session()->flash('alert', 'La Clave Nueva no es igual a la de confirmacion.');
        }
    }

    public function clearPassword()
    {
        $this->reset(['claveAnterior', 'claveNueva', 'verificacion']);
    }
}
