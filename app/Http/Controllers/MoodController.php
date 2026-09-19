<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mood;

class MoodController extends Controller
{
    public function index()
    {
        $counts = [
            'happy' => Mood::where('mood', 'Happy')->count(),
            'neutral' => Mood::where('mood', 'Neutral')->count(),
            'sad' => Mood::where('mood', 'Sad')->count(),
            'angry' => Mood::where('mood', 'Angry')->count(),
        ];

        $total = array_sum($counts);

        // hitung persentase
        $percent = [];
        foreach ($counts as $key => $value) {
            $percent[$key] = $total ? round(($value / $total) * 100, 1) : 0;
        }

        return view('mood', compact('counts', 'total', 'percent'));
    }

    public function store(Request $request)
    {
        Mood::create([
            'mood' => $request->mood
        ]);

        return redirect()->route('mood.index')->with('success', 'Mood saved!');
    }

    public function reset()
    {
        Mood::truncate();

        return redirect()->route('mood.index');
    }
}
