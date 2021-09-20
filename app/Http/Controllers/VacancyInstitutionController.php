<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyInstitutionController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all();
        return view('pages.vacancy', compact('vacancies'));
    }
}
