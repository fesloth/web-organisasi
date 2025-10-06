<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Event::query();

        if ($status && strtolower($status) != 'semua') {
            // asumsi status disimpan dengan kapital pertama, misal "Berlangsung"
            $query->where('status', ucfirst(strtolower($status)));
        }

        $events = $query->orderBy('tanggal_mulai', 'asc')->get();
        $title = 'Event';

        return view('event', compact('events', 'title'));
    }
}
