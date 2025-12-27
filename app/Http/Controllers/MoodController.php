<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodEntry;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    public function create()
    {
        return view('create.createentry');
    } 
        public function store(Request $request)
        {
            // Validate ang inputs
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'emotion' => 'required|string',
            'specific_emotion' => 'nullable|string',
            'tags' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
            //Creation Entry using Eloquent
        MoodEntry::create([
            'user_id' => Auth::id(), // Link sa loggedin user
            'date' => $request->date,
            'time' => $request->time,
            'emotion' => $request->emotion,
            'specific_emotion' => $request->specific_emotion,
            'tags' => $request->tags,
            'intensity' => 10, 
            'notes' => $request->notes,
        ]);

            // Redirect to history page (or dashboard)
        return redirect()->route('mood.history')->with('success', 'Entry created successfully!');
        }
        
        public function entry()
        {
            $entries = MoodEntry::where('user_id', auth::id())
                                ->orderBy('date', 'desc')
                                ->orderBy('time','desc')
                                ->get();

            return view('activity.moodentry', compact('entries'));
            
        }
        public function history()
        {
            $entries = MoodEntry::where('user_id', auth::id())
                                ->orderBy('date', 'desc')
                                ->orderBy('time','desc')
                                ->get();

            return view('activity.moodhistory', compact('entries'));
            
        }
}
