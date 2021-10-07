<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Form;
use App\Models\Petition;

class ReportController extends Controller
{
    //
    public function reposicion($petition_id)
    {
        $petition = Petition::find($petition_id);

        $forms = Form::where('petition_id', $petition_id)->get();
        $title = "ANEXO 2: CUADRO DETALLE DE SOLICITUD DE REPOSICION DE SALARIOS";
        $pdf = PDF::loadView('reports.reposicion',compact('title','forms','petition'));
        $pdf->setPaper('a4', 'landscape')->setWarnings(false);
    return $pdf->stream('reposicion.pdf');
    }
}
