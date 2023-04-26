<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\roomClass;
use App\Models\User;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function admin_home()
    {
        $studentstat = count(User::get()->where('role', 'student'));
        $teacherstat = count(User::get()->where('role', 'teacher'));
        $classstat = count(roomClass::get());
        $absences = Absence::get();
        return view('dashboard', compact('absences', 'studentstat', 'classstat', 'teacherstat'));
    }
    public function justify($id)
    {
        $absence = Absence::findOrFail($id);
        $absence->where('id', $id)
            ->update(['status' => 'Justified']);

        return redirect()->route('dashboard')->with('success', 'Absence Justified successfully.');
    }
}
