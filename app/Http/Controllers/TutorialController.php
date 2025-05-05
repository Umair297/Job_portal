<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class TutorialController extends Controller
{
    // Show the list of tutorials

    public function toturial()
    {
        $tutorials = Tutorial::all(); // Fetch all tutorials from the database
        return view('tutorial', compact('tutorials'));
    }

    public function index()
    {
        $tutorials = Tutorial::all();
        return view('tutorials.list', compact('tutorials'));
    }

    // Show the form for creating a new tutorial
    public function create()
    {
        return view('tutorials.create');
    }

    // Store a newly created tutorial
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'nullable|', // max file size 10MB
        ]);

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        Tutorial::create([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $videoPath,
        ]);

        return redirect()->route('tutorials.index')->with('success', 'Tutorial created successfully!');
    }

    // Show the details of a specific tutorial
    public function show($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        return view('tutorials.show', compact('tutorial'));
    }

    // Show the form for editing the tutorial
    public function edit($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        return view('tutorials.edit', compact('tutorial'));
    }

    // Update the specified tutorial
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'nullable|',
        ]);

        $tutorial = Tutorial::findOrFail($id);

        $videoPath = $tutorial->video;
        if ($request->hasFile('video')) {
            // Delete the old video if there is a new one
            if ($tutorial->video) {
                Storage::delete('public/' . $tutorial->video);
            }
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        $tutorial->update([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $videoPath,
        ]);

        return redirect()->route('tutorials.index')->with('success', 'Tutorial updated successfully!');
    }

    // Remove the specified tutorial
    public function destroy($id)
    {
        $tutorial = Tutorial::findOrFail($id);

        // Delete the video file
        if ($tutorial->video) {
            Storage::delete('public/' . $tutorial->video);
        }

        $tutorial->delete();

        return redirect()->route('tutorials.index')->with('success', 'Tutorial deleted successfully!');
    }
}
