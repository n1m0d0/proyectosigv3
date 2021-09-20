<?php

namespace App\Http\Livewire;

use App\Models\Ability;
use Livewire\Component;

class AbilityPerson extends Component
{
    public $person_id;
    public $habilidad;

    public function mount()
    {
        $this->person_id = auth()->user()->person->id;
    }

    public function render()
    {
        $abilities = Ability::where('person_id', $this->person_id)->get();
        return view('livewire.ability-person', compact('abilities'));
    }

    public function addAbility()
    {
        $this->validate([
            'habilidad' => 'required|max:256'
        ]);

        $ability =  new Ability();
        $ability->person_id = $this->person_id;
        $ability->descripcion = $this->habilidad;
        $ability->estado = "ACTIVO";
        $ability->save();

        $this->clearAbility();
    }

    public function clearAbility()
    {
        $this->reset(['habilidad']);           
    }
}
