<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('tanggal_mulai', 'asc')->get();
        $title = 'Program Kerja';
        return view('program', compact('programs', 'title'));
    }
}
