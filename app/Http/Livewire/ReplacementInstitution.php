<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use App\Models\Replacement;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReplacementInstitution extends Component
{
    use WithFileUploads;

    public $ventana = 1;
    public $contract_id;
    public $fechaInicio;
    public $fechaFin;
    public $monto;
    public $archivoC31;
    public $official_id;

    public function mount()
    {
        $this->official_id = auth()->user()->official->id;
    }

    public function render()
    {
        if ($this->contract_id != null) {
            $this->ventana = 2;
        }
        $contracts = Contract::where('estado', "ACTIVO")->get();
        return view('livewire.replacement-institution', compact('contracts'));
    }

    public function payContract()
    {
        $this->validate([
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'monto' => 'required|numeric',
            'archivoC31' => 'required|mimes:jpg,bmp,png,pdf|max:5120'
        ]);

        $replacement = new Replacement();
        $replacement->contract_id = $this->contract_id;
        $replacement->fecha_inicio = $this->fechaInicio;
        $replacement->fecha_fin = $this->fechaFin;
        $replacement->monto = $this->monto;
        $replacement->c31 = $this->archivoC31->store('public');
        $replacement->official_id = $this->official_id;
        $replacement->save();

        $contract = Contract::find($this->contract_id);
        $contract->estado = "PAGADO";
        $contract->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->clearReplacement();
    }

    public function clearReplacement()
    {
        $this->ventana = 1;
        $this->reset(['contract_id', 'fechaInicio', 'fechaFin', 'monto', 'archivoC31']); 
    }
}
