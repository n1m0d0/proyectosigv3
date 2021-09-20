<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgreementInstitutionController extends Controller
{
    public function index()
    {
        return view('pages.agreement');
    }
}
