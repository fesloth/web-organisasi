<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Event::query();

        // Filter berdasarkan status jika ada
        if ($status && strtolower($status) != 'semua') {
            $query->where('status', ucfirst(strtolower($status)));
        }

        $events = $query->orderBy('tanggal_mulai', 'asc')->get();
        $title = 'Event';

        return view('event', compact('events', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:Mendatang,Berlangsung,Selesai',
        ]);

        // Simpan gambar kalau ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('events', 'public');
            $validated['gambar'] = $path;
        }

        Event::create($validated);

        return redirect()->route('event')->with('success', 'Event berhasil ditambahkan.');
    }

    public function destroy(Event $event)
    {
        if ($event->gambar) {
            Storage::delete('public/' . $event->gambar);
        }

        $event->delete();
        return redirect()->route('event')->with('success', 'Event berhasil dihapus.');
    }
}
