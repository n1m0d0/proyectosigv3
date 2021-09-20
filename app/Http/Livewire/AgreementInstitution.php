<?php

namespace App\Http\Livewire;

use App\Models\Agreement;
use App\Models\Institution;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AgreementInstitution extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $searchInstitution;
    public $searchDate;
    public $searchState;
    public $institution;
    public $fechaConvenio;
    public $archivoConvenio;
    public $usuario;

    public function mount()
    {
        $this->usuario = auth()->user()->id;
    }

    public function render()
    {
        if ($this->searchInstitution) {
            if ($this->searchDate) {
                $agreements = Agreement::where('institution_id', $this->searchInstitution)->where('fecha_convenio', $this->searchDate)->get();
            } else {
                $agreements = Agreement::where('institution_id', $this->searchInstitution)->get();
            }
        } else {
            if ($this->searchDate) {
                if ($this->searchInstitution) {
                    $agreements = Agreement::where('institution_id', $this->searchInstitution)->where('fecha_convenio', $this->searchDate)->get();
                } else {
                    $agreements = Agreement::where('fecha_convenio', $this->searchDate)->get();
                }
            } else {
                $agreements = Agreement::all();
            }
        }
        $institutions = Institution::where('estado', 'REGISTRADO')->get();
        return view('livewire.agreement-institution', compact('agreements', 'institutions'));
    }

    public function createAgreement()
    {
        $this->validate([
            'institution' => 'required',
            'fechaConvenio' => 'required|date',
            'archivoConvenio' => 'required|mimes:jpg,bmp,png,pdf|max:5120'
        ]);

        $agreement = new Agreement();
        $agreement->institution_id = $this->institution;
        $agreement->fecha_convenio = $this->fechaConvenio;
        $agreement->convenio = $this->archivoConvenio->store('public');
        $agreement->user_id = $this->usuario;
        $agreement->save();

        $institution = Institution::find($this->institution);
        $institution->estado = "ACTIVO";
        $institution->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultAgreement();
    }

    public function defaultAgreement()
    {
        $this->reset(['institution', 'fechaConvenio', 'archivoConvenio']);
    }

    public function downloadAgreement($id)
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
    }
}
