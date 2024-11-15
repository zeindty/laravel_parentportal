<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
{
    $events = Event::all()->map(function ($event) {
        return [
            'title' => $event->name,
            'start' => Carbon::parse($event->date)->format('Y-m-d'), // pastikan formatnya sesuai
            'category' => $event->category,
            'description' => $event->description,
        ];
    });
    $events = Event::paginate(5);

    return view('events.index', compact('events'));
}

    public function store(Request $request)
    {
        // Logic untuk menyimpan data event baru
    }
    public function create()
{
    return view('events.create');
}


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Logic untuk memperbarui event
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('events.index');
    }
}
