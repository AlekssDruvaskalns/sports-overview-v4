<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Sport;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Sport $sport = null)
    {
        // $athletes = Athlete::with('sport')->get();
        // return view('athlete.index', compact('athletes'));

        if ($sport) {
            
            $athletes = Athlete::where('sport_id', $sport->id)->with('sport')->get();
        } else {
            
            $athletes = Athlete::with('sport')->get();
        }
    
        return view('athlete.index', compact('athletes', 'sport'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sports = Sport::all(); 
        return view('athlete.create', compact('sports')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'nationality' => 'required|string|max:255',
            'height' => 'required|numeric|min:0|max:3',
            'sport_id' => 'required|exists:sports,id',
            'sport_attributes' => 'nullable|array',
        ]);

        Athlete::create($validated);

        return redirect()->route('athlete.index')->with('success', 'Athlete created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Athlete $athlete)
    {
        return view('athlete.show', compact('athlete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Athlete $athlete)
    {
        $sports = Sport::all();
        return view('athlete.edit', compact('athlete', 'sports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Athlete $athlete)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'nationality' => 'required|string|max:255',
            'height' => 'required|numeric|min:0|max:3',
            'sport_id' => 'required|exists:sports,id',
            'sport_attributes' => 'nullable|array',
        ]);

        Athlete::create($validated);

        return redirect()->route('athlete.index')->with('success', 'Athlete created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        return redirect()->route('athlete.index')->with('success', 'Athlete deleted successfully.');
    }
}
