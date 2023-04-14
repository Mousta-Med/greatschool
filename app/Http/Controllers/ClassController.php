<?php

namespace App\Http\Controllers;

use App\Models\roomClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = roomClass::latest()->get();
        return view('classes', compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        roomClass::create($validated);

        return redirect()->route('classes')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(roomClass $roomClass)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Class = RoomClass::findOrFail($id);
        return view('updateclass', compact('Class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $roomClass = RoomClass::findOrFail($id);
        $roomClass->update($validated);

        return redirect()->route('classes')->with('success', 'Class Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roomClass = RoomClass::findOrFail($id);
        $roomClass->delete();

        return redirect()->route('classes')->with('success', 'Class Deleted successfully.');
    }
}
