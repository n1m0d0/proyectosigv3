<?php

namespace App\Http\Livewire;

use App\Models\Agreement;
use App\Models\Assignment;
use App\Models\Institution;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AgreementInstitution extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $ventana = 1;
    public $fechaConvenio;
    public $finConvenio;
    public $archivoConvenio;
    public $usuario;
    public $official_id;
    public $institution_id;
    public $detalle;

    public function mount()
    {
        $this->usuario = auth()->user()->id;
        $this->official_id = auth()->user()->official_id;
    }

    public function render()
    {
        $assignments = Assignment::where('official_id', $this->official_id)->where('estado', "ACTIVO")->get();
        if($this->institution_id != null) {
            $this->ventana = 2;
        }
        return view('livewire.agreement-institution', compact('assignments'));
    }

    public function createAgreement()
    {
        $this->validate([
            'fechaConvenio' => 'required|date',
            'finConvenio' => 'required|date',
            'detalle' => 'required',
            'archivoConvenio' => 'required|mimes:jpg,bmp,png,pdf|max:5120'
        ]);

        $agreement = new Agreement();
        $agreement->institution_id = $this->institution_id;
        $agreement->fecha_convenio = $this->fechaConvenio;        
        $agreement->fin_convenio = $this->finConvenio;      
        $agreement->detalle = $this->detalle;
        $agreement->convenio = $this->archivoConvenio->store('public');
        $agreement->user_id = $this->usuario;
        $agreement->save();

        $institution = Institution::find($this->institution_id);
        $institution->estado = "ACTIVO";
        $institution->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultAgreement();

        $this->ventana = 1;
    }

    public function defaultAgreement()
    {
        $this->reset(['institution_id', 'fechaConvenio', 'archivoConvenio']);
    }

    /*public function downloadAgreement($id)
    {
        $agreement = Agreement::find($id);
        return Storage::download($agreement->convenio);
    }

    public function softDeleteAgreement($id)
    {
        $agreement = Agreement::find($id);
        $agreement->estado = "INACTIVO";
        $agreement->save();

        $institution = Institution::find($agreement->institution->id);
        $institution->estado = "REGISTRADO";
        $institution->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');
    }

    public function defaultFilters()
    {
        $this->reset(['searchInstitution', 'searchDate', 'searchState']);
    }*/
}
