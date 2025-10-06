<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::latest()->get();
        $title = 'Forum';
        return view('forum', compact('forums', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Forum::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'penulis' => Auth::user()->name, // otomatis ambil nama user login
        ]);

        return redirect()->route('forum')->with('success', 'Topik berhasil dibuat.');
    }

    public function edit(Forum $forum)
    {
        return view('forum_edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:100',
        ]);

        // Hanya bisa edit jika penulis sama
        if ($forum->penulis !== $validated['penulis']) {
            return back()->with('error', 'Kamu tidak bisa mengedit topik orang lain.');
        }

        $forum->update($validated);

        return redirect()->route('forum')->with('success', 'Topik berhasil diperbarui.');
    }

    public function destroy(Request $request, Forum $forum)
    {
        // Hanya bisa hapus jika penulis sama
        if ($forum->penulis !== $request->input('penulis')) {
            return back()->with('error', 'Kamu tidak bisa menghapus topik orang lain.');
        }

        $forum->delete();
        return redirect()->route('forum')->with('success', 'Topik berhasil dihapus.');
    }
}
