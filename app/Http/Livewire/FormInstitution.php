<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Coordinator;
use App\Models\Department;
use App\Models\Institution;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FormInstitution extends Component
{
    use WithFileUploads;    
    use WithPagination;

    public $institution;
    public $institution_id;
    //complementar datos
    public $archivoNit;
    public $rubro;
    public $actividad;
    //representante
    public $nombreRepresentante;
    public $paternoRepresentante;
    public $maternoRepresentante;
    public $emailRepresentante;
    public $telefonoRepresentante;
    //sucursales
    public $tipo;
    public $departamento;
    public $direccion;
    public $telefono;
    //enlaces
    public $nombresEnlace;
    public $paternoEnlace;
    public $maternoEnlace;
    public $telefonoEnlace;
    public $correoEnlace;

    public function mount()
    {
        $this->rubro = $this->institution->rubro;
        $this->actividad = $this->institution->actividad;
        
        $this->nombreRepresentante = $this->institution->nombre;
        $this->paternoRepresentante = $this->institution->paterno;
        $this->maternoRepresentante = $this->institution->materno;
        $this->emailRepresentante = $this->institution->email;
        $this->telefonoRepresentante = $this->institution->telefono;
    }

    public function render()
    {
        $departments = Department::all();
        $branchs = Branch::where('institution_id', $this->institution_id)->paginate(5);
        $coordinators = Coordinator::where('institution_id', $this->institution_id)->paginate(5);
        return view('livewire.form-institution', compact('departments', 'branchs', 'coordinators'));
    }

    public function updateInstitution(){
        $this->validate([
            'rubro' => 'required',
            'actividad' => 'required',
            'archivoNit' => 'required|mimes:jpg,bmp,png,pdf|max:5120'
        ]);

        $institution = Institution::find($this->institution_id);
        $institution->rubro = $this->rubro;
        $institution->actividad = $this->actividad;
        $institution->file_nit = $this->archivoNit->store('public');
        $institution->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');
    }

    public function updateLegalRepresentative(){
        $this->validate([
            'nombreRepresentante' => 'required',
            'paternoRepresentante' => 'required',
            'maternoRepresentante' => 'required',
            'telefonoRepresentante' => 'required|numeric',
            'emailRepresentante' => 'required|email'
        ]);

        $institution = Institution::find($this->institution_id);
        $institution->nombre = $this->nombreRepresentante;
        $institution->paterno = $this->paternoRepresentante;
        $institution->materno = $this->maternoRepresentante;
        $institution->telefono = $this->telefonoRepresentante;
        $institution->email = $this->emailRepresentante;
        $institution->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');
    }

    public function addBranch(){
        $this->validate([
            'tipo' => 'required',
            'departamento' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric'
        ]);

        $branch = new Branch();
        $branch->institution_id = $this->institution_id;
        $branch->department_id = $this->departamento;
        $branch->direccion = $this->direccion;
        $branch->telefono = $this->telefono;
        $branch->tipo = $this->tipo;
        $branch->estado = "ACTIVO";
        $branch->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultBranch();
    }

    public function defaultBranch()
    {
        $this->departamento = "";
        $this->direccion = "";
        $this->telefono = "";
    }

    public function addCoordinator()
    {
        $this->validate([
            'nombresEnlace' => 'required',
            'paternoEnlace' => 'required',
            'maternoEnlace' => 'required',
            'telefonoEnlace' => 'required|numeric',
            'correoEnlace' => 'required|email'
        ]);

        $coordinator = new Coordinator();
        $coordinator->institution_id = $this->institution_id;
        $coordinator->nombres = $this->nombresEnlace;
        $coordinator->paterno = $this->paternoEnlace;
        $coordinator->materno = $this->maternoEnlace;
        $coordinator->telefono = $this->telefonoEnlace;        
        $coordinator->email = $this->correoEnlace;
        $coordinator->estado = "ACTIVO";
        $coordinator->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultCoordinator();
    }

    public function defaultCoordinator()
    {
        $this->nombresEnlace = "";
        $this->paternoEnlace = "";
        $this->maternoEnlace = "";
        $this->telefonoEnlace = "";
        $this->correoEnlace = "";
    }
}
