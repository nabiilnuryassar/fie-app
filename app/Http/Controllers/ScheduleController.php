<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // return "Ini halaman checklist";
        return view('sections.checklist');
    }
}
