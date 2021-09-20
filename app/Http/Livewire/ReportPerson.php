<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use App\Exports\PeopleExport;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ReportPerson extends Component
{
    use WithPagination;
    public $departamento;
    public $genero;
    public $estadoCivil;
    public $hijo;
    public $estado;
    public $resultSearch;

    public function mount()
    {

    }

    public function render()
    {
        //$people = Person::paginate(10);
        $departments = Department::all();

        $peopleQuery = Person::query();

        if ($this->departamento) {
            $peopleQuery = $peopleQuery->where('department_id', $this->departamento);
        }

        if ($this->genero) {
            $peopleQuery = $peopleQuery->where('genero', $this->genero);
        }

        if ($this->estadoCivil) {
            $peopleQuery = $peopleQuery->where('estado_civil', $this->estadoCivil);
        }

        if ($this->hijo != null) {
            $peopleQuery = $peopleQuery->where('hijos', $this->hijo);
        }

        if ($this->estado) {
            $peopleQuery = $peopleQuery->where('estado', $this->estado);
        }
        
        $this->resultSearch = $peopleQuery->get();
        $people = $peopleQuery->paginate(20);
        
        return view('livewire.report-person', compact('people', 'departments'));
    }

    public function clearReport()
    {
        $this->reset(['departamento', 'genero', 'estadoCivil', 'hijo', 'estado']);
    }

    public function exportExcel() 
    {
        $date = Carbon::now()->toDateTimeString();
        return Excel::download(new PeopleExport($this->resultSearch), "Personas$date.xlsx");
        //return (new PeopleExport($this->resultSearch))->download('Personas.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
