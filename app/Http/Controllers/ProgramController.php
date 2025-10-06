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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penanggung_jawab' => 'nullable|string|max:100',
        ]);

        $validated['status'] = 'Belum';
        $validated['progress'] = 0;

        Program::create($validated);

        return redirect()->route('program')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penanggung_jawab' => 'nullable|string|max:100',
            'status' => 'nullable|string',
            'progress' => 'nullable|integer|min:0|max:100',
        ]);

        $program->update($validated);
        return redirect()->route('program')->with('success', 'Program kerja berhasil diperbarui!');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('program')->with('success', 'Program kerja berhasil dihapus.');
    }
}
