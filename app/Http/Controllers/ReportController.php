<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    //
    public function reposicion()
    {
        $pdf = PDF::loadView('reports.reposicion');
        $pdf->setPaper('a4', 'landscape')->setWarnings(false);
    return $pdf->stream('reposicion.pdf');
    }
}
