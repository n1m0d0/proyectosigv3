<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class ContractInstitutionController extends Controller
{
    public function index()
    {
        
        return view('pages.contract');
    }
}
