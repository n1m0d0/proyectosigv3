<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterOfficialController extends Controller
{
    public function index()
    {
        return view('pages.registerOfficial');
    }
}
