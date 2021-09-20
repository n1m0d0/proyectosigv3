<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Career;
use App\Models\Institution;
use App\Models\Vacancy;
use Livewire\Component;

class VacancyInstitution extends Component
{
    public $institution_id;
    public $sucursal;
    public $nombreVacacia;
    public $gradoAcademico;
    public $carrera;
    public $descripcion;
    public $salario;
    public $cantidad;

    public $vacancy_id;
    
    public function render()
    {   
        $institution = Institution::find($this->institution_id);
        $branches = Branch::where('institution_id', $this->institution_id)->get();
        $careers = Career::all();
        $vacancies = Vacancy::where('institution_id', $this->institution_id)->get();
        return view('livewire.vacancy-institution', compact('institution', 'branches', 'careers', 'vacancies'));
    }

    public function addVacancy()
    {
        $this->validate([
            'sucursal' => 'required',
            'nombreVacacia' => 'required',
            'gradoAcademico' => 'required',
            'carrera' => 'required',
            'descripcion' => 'required',
            'salario' => 'required|numeric',
            'cantidad' => 'required|integer'
        ]);

        $vacancy = new Vacancy();
        $vacancy->institution_id = $this->institution_id;
        $vacancy->branch_id = $this->sucursal;
        $vacancy->nombre = $this->nombreVacacia;
        $vacancy->grado_academico = $this->gradoAcademico;
        $vacancy->career_id = $this->carrera;
        $vacancy->descripcion = $this->descripcion;
        $vacancy->salario = $this->salario;
        $vacancy->cantidad = $this->cantidad;
        $vacancy->estado = "ACTIVO";
        $vacancy->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultVacancy();
    }

    public function defaultVacancy()
    {
        $this->sucursal = "";
        $this->nombreVacacia = "";
        $this->gradoAcademico = "";
        $this->carrera = "";
        $this->descripcion = "";
        $this->salario = "";
        $this->cantidad = "";
    }

    public function inactiveVacancy($vacancy_id)
    {
        $vacancy = Vacancy::find($vacancy_id);
        $vacancy->estado = "INACTIVO";
        $vacancy->save();

        session()->flash('message', 'Se dio de baja correctamente.');
    }
}
