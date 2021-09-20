<?php

namespace App\Exports;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;

class PeopleExport implements FromView, WithTitle
{
    use Exportable;
    private $peopleQuery;

    public function __construct($peopleQuery)
    {
        $this->peopleQuery = $peopleQuery;
    }


    public function view(): View
    {
        return view('exports.person', [
            'people' => $this->peopleQuery
        ]);
    }
    
    public function title(): string
    {
        return 'Personas';
    }

}
