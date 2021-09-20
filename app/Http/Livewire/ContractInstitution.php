<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use App\Models\Package;
use App\Models\Payroll;
use App\Models\Person;
use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContractInstitution extends Component
{
    use WithFileUploads;

    public $ventana = 1;
    public $vacancia_id;
    public $payrolls;
    public $payroll_id;
    public $archivoContrato;
    public $codigo;
    public $package_id;

    public function render()
    {
        if ($this->vacancia_id != null) {
            $this->ventana = 2;
            $this->payrolls = Payroll::where('vacancy_id', $this->vacancia_id)->where('estado', "ACTIVO")->get();
        }
        $vacancies = Vacancy::where('estado', "ACTIVO")->where('cantidad', '>', 0)->get();
        $packages = Package::all();
        return view('livewire.contract-institution', compact('vacancies', 'packages'));
    }

    public function addContract()
    {
        $this->validate([
            'payroll_id' => 'required',
            'package_id' => 'required',
            'archivoContrato' => 'required|mimes:jpg,bmp,png,pdf|max:5120',
            'codigo' => 'required'
        ]);

        $this->ventana = 1;
        $this->vacancia_id = null;

        $payroll = Payroll::find($this->payroll_id);
        $payroll->estado = "SELECCIONADO";
        $payroll->save();
        
        $contract = new Contract();
        $contract->institution_id = $payroll->vacancy->institution->id;
        $contract->vacancy_id = $payroll->vacancy->id;
        $contract->person_id = $payroll->person->id;
        $contract->package_id =  $this->package_id;
        $contract->archivo = $this->archivoContrato->store('public');
        $contract->codigo = $this->codigo;
        $contract->estado = "ACTIVO";
        $contract->save();

        $person = Person::find($payroll->person->id);
        $person->estado = "BENEFICIADO";
        $person->save();

        $vacancy = Vacancy::find($payroll->vacancy->id);
        $vacancy->cantidad = $vacancy->cantidad - 1;
        if($vacancy->cantidad == 0){
            $vacancy->estado = "CONCLUIDO";
        }
        $vacancy->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        foreach ($vacancy->payrolls as $payroll){
            $persona = Person::find($payroll->person->id);
            if($persona->estado == "SELECCIONADO") {
                $persona->estado = "REGISTRADO";
                $persona->save();
            }
        }

        $this->clearContract();
    }

    public function clearContract(){
        $this->reset(['payroll_id', 'package_id', 'archivoContrato', 'codigo']); 
    }
}
