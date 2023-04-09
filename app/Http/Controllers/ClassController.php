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
        return view('classes');
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
    public function edit(roomClass $roomClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, roomClass $roomClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(roomClass $roomClass)
    {
        //
    }
}
