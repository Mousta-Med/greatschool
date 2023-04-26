<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Marks;
use App\Models\User;
use App\Models\roomClass;
use Illuminate\Support\Facades\Auth;
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
        $students = User::where('role', 'student')->where('class_id', Auth::user()->class_id)->latest()->get();
        return view('teacher', compact('students'));
    }
    public function manage($id)
    {
        $student = User::findOrFail($id);
        $absences = Absence::get()->where('user_id', $id);
        $marks = Marks::where('student_id', $id)->where('teacher_id', Auth::user()->id)->first();
        if ($student->role === 'student') {
            return view('manageStudent', compact('student', 'absences', 'marks'));
        } else {
            abort('403');
        }
    }
    public function absence(Request $request, $id)
    {
        $student = User::findOrFail($id);
        $validated =  $request->validate([
            'date' => 'required|date|after_or_equal:today',
        ]);


        $existingAbsences = Absence::where('user_id', $id)
            ->whereIn('absenceDate', (array) $request->date)
            ->get();

        if ($existingAbsences->count() === 0) {
            $absence = Absence::create([
                'user_id' => $id,
                'absenceDate' => $request->date,
            ]);
            return redirect()->route('manageStudent', $id)->with('success', 'Absence Added successfully.');
        } else {
            return redirect()->route('manageStudent', $id)->with('error', 'Duplicated date.');
        }
    }
    public function mark(Request $request, $id)
    {
        $validatedData = $request->validate([
            'exam' => 'required|string',
            'mark' => 'required|min:0|max:20',
        ]);

        $mark = Marks::where('student_id', $id)
            ->where('teacher_id', Auth::user()->id)
            ->update([$validatedData['exam'] => $validatedData['mark']]);

        if ($mark) {
            return redirect()->route('manageStudent', $id)->with('success', 'Mark Added successfully.');
        } else {
            $mark = Marks::create([
                'student_id' => $id,
                'teacher_id' => Auth::user()->id,
                $validatedData['exam'] => $validatedData['mark'],
            ]);
            return redirect()->route('manageStudent', $id)->with('success', 'Mark Added successfully.');
        }
    }
}
