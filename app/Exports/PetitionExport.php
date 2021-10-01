<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;

class PetitionExport implements FromView, WithTitle
{
    use Exportable;
    private $formsQuery;

    public function __construct($formsQuery)
    {
        $this->formsQuery = $formsQuery;
    }


    public function view(): View
    {
        return view('exports.petitionForm', [
            'forms' => $this->formsQuery
        ]);
    }
    
    public function title(): string
    {
        return 'Repocision';
    }
}
