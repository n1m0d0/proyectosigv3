<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Form;

class ReportController extends Controller
{
    //
    public function reposicion($petition_id)
    {
        $forms = Form::where('petition_id', $petition_id)->get();
        $title = "ANEXO 2: CUADRO DETALLE DE SOLICITUD DE REPOSICION DE SALARIOS";
        $pdf = PDF::loadView('reports.reposicion',compact('title','forms'));
        $pdf->setPaper('a4', 'landscape')->setWarnings(false);
    return $pdf->stream('reposicion.pdf');
    }
}
