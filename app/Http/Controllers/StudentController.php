<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roomClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('role', 'student')->latest()->get();
        $classes = roomClass::latest()->get();
        return view('students', compact('students', 'classes'));
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
        $request->validate([
            'name' => ['required', 'string'],
            'age' => ['required', 'integer', 'max:25'],
            'class' => ['required', 'string'],
            'photo' => ['required', 'image'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $photo = $request->photo->getClientOriginalName();
        $request->photo->move('img', $photo);


        $class = roomClass::where('title', $request->class)->first();
        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'class_id' => $class->id,
            'photo' => $photo,
            'role' => 'student',
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('students')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classes = roomClass::latest()->get();
        $student = User::findOrFail($id);
        return view('updatestudent', compact('classes', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'age' => ['required', 'integer', 'max:25'],
            'class' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->photo->getClientOriginalName();
            $request->photo->move('img', $photo);
            $validated['photo'] = $photo;
        }

        $class = roomClass::where('title', $request->class)->first();

        $validated['class_id'] = $class->id;

        $student = User::findOrFail($id);
        $student->update($validated);

        return redirect()->route('students')->with('success', 'Student Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('students')->with('success', 'Student Deleted successfully.');
    }
}
