<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::all(); // Get all organizations
        return view('event.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'organization_id' => 'nullable|exists:organizations,id',
        'fights.*.fighter_one' => 'required|string',
        'fights.*.fighter_two' => 'required|string',
    ]);
        
        $event = Event::create($request->only(['name', 'date', 'location', 'organization_id']));

        foreach ($request->input('fights', []) as $index => $fightData) {
        $event->fights()->create([
            'fighter_one' => $fightData['fighter_one'],
            'fighter_two' => $fightData['fighter_two'],
            'weight_class' => $fightData['weight_class'] ?? null,
            'order' => $index,
        ]);
    }
        
        return redirect()->route('events.index')->with('success', 'Event with fights created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
    $event->load('fights');
    return view('event.show', compact('event'));
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $organizations = Organization::all(); // Fetch all organizations
        return view('event.edit', compact('event', 'organizations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
        'name' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'organization_id' => 'nullable|exists:organizations,id',
        'fights.*.fighter_one' => 'required|string',
        'fights.*.fighter_two' => 'required|string',
    ]);
        
    $event->update($request->only(['name', 'date', 'location', 'organization_id']));

    // Sync or create/update fights
    foreach ($request->input('fights', []) as $fightData) {
        if (isset($fightData['id'])) {
            // Update existing fight
            \App\Models\Fight::where('id', $fightData['id'])->update([
                'fighter_one' => $fightData['fighter_one'],
                'fighter_two' => $fightData['fighter_two'],
                'weight_class' => $fightData['weight_class'] ?? null,
            ]);
        } else {
        // Create new fight
            $event->fights()->create([
                'fighter_one' => $fightData['fighter_one'],
                'fighter_two' => $fightData['fighter_two'],
                'weight_class' => $fightData['weight_class'] ?? null,
                'order' => 0,
            ]);
        }
    }
    // Delete removed fights
    if ($request->deleted_fights) {
        $idsToDelete = explode(',', $request->deleted_fights);
        \App\Models\Fight::whereIn('id', $idsToDelete)->delete();
    }

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
