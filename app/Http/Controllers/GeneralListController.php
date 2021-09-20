<?php

namespace App\Http\Controllers;

use App\Models\GeneralList;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class GeneralListController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::where('estado', 'ACTIVO')->get();
        return view('pages.generalList', compact('vacancies'));
    }
}
