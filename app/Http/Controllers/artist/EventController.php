<?php

namespace App\Http\Controllers\artist;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve events for the authenticated artist, paginated
        $events = Event::where('artist_id', auth()->user()->artist->id)
            ->orderBy('event_date', 'asc')
            ->paginate(10); // Adjust pagination as needed

        return view('artist.events.index', compact('events'));
    }
    public function create()
    {
        return view('artist.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'ticket_link' => 'nullable|url',
            'promotional_details' => 'nullable|string',
        ]);

        $event = Event::create([
            'artist_id' => auth()->user()->artist->id,
            'title' => $request->title,
            'event_date' => $request->event_date,
            'ticket_link' => $request->ticket_link,
            'promotional_details' => $request->promotional_details,
        ]);

        return redirect()->route('artist.dashboard')->with('success', 'Event added successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('artist.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'ticket_link' => 'nullable|url',
            'promotional_details' => 'nullable|string',
        ]);

        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->ticket_link = $request->ticket_link;
        $event->promotional_details = $request->promotional_details;
        $event->save();

        return redirect()->route('artist.dashboard')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully.');
    }
}
