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
        // $students = User::latest()->get();
        $students = User::with('class')->has('class')->latest()->get();
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
            'age' => ['required', 'integer'],
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
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('students')->with('success', 'Student created successfully.');
        } else {
            return redirect()->route('students')->with('error', 'Unable to create student. Please try again.');
        }
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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
