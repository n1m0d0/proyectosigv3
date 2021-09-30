<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetitionInstitutionController extends Controller
{
    public function index()
    {
        return view('pages.petitionInstitution');
    }
}
