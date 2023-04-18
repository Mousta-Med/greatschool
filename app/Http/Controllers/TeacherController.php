<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roomClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::where('role', 'teacher')->latest()->get();
        $classes = roomClass::latest()->get();
        return view('teachers', compact('teachers', 'classes'));
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
        $request->validate([
            'name' => ['required', 'string'],
            'material' => ['required', 'string'],
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
            'material_study' => $request->material,
            'class_id' => $class->id,
            'photo' => $photo,
            'role' => 'teacher',
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('teachers')->with('success', 'Teacher created successfully.');
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
        $teacher = User::findOrFail($id);

        if ($teacher->role === 'teacher') {
            $classes = roomClass::latest()->get();
            return view('updateteacher', compact('classes', 'teacher'));
        } else {
            abort('403');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'material_study' => ['required', 'string'],
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

        $teacher = User::findOrFail($id);
        $teacher->update($validated);

        return redirect()->route('teachers')->with('success', 'Teacher Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers')->with('success', 'Teachers Deleted successfully.');
    }

    public function home()
    {
        return view('teacher');
    }
}
