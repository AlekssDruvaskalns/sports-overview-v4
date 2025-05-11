<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Sport;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sport $sport = null)
    {
        if ($sport) {
            // Load organizations for a specific sport
            $organizations = Organization::where('sport_id', $sport->id)->with(['events', 'posts'])->get();
        } else {
            // Load all organizations with events and posts
            $organizations = Organization::with(['events', 'posts'])->get();
        }
    
        return view('organization.index', compact('organizations', 'sport'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sports = Sport::all();
        return view('organization.create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
        ]);

        Organization::create($request->all());

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {

        // $events = $organization->events;
        // $posts = $organization->posts;

        
        // return view('organization.show', compact('organization', 'events', 'posts'));
        $organization->load(['events', 'posts']);

        return view('organization.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        $sports = Sport::all();
        return view('organization.edit', compact('organization', 'sports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $organization->update($request->all());

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
}
