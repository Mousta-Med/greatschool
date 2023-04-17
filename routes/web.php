<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/home', [Homecontroller::class, 'index'])->name('home');
Route::get('/', [Homecontroller::class, 'index'])->name('home');

Route::middleware('teacher')->group(function () {
    Route::get('teacher', [Homecontroller::class, 'create'])->name('teacher');
});




Route::middleware('auth', 'admin')->group(function () {
    //dashboard
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //profile
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //classes
    Route::get('/admin/classes', [ClassController::class, 'index'])->name('classes');
    Route::get('/admin/classes/edit/{id}', [ClassController::class, 'edit'])->name('classes.edit');
    Route::post('/admin/classes', [ClassController::class, 'store'])->name('classes.store');
    Route::delete('/admin/classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy');
    Route::patch('/admin/classes/{id}', [ClassController::class, 'update'])->name('classes.update');
    //students
    Route::get('/admin/students', [StudentController::class, 'index'])->name('students');
    Route::get('/admin/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/admin/students', [StudentController::class, 'store'])->name('students.store');
    Route::delete('/admin/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::patch('/admin/students/{id}', [StudentController::class, 'update'])->name('students.update');
    //teachers
    Route::get('/admin/teachers', [teacherController::class, 'index'])->name('teachers');
    Route::get('/admin/teachers/edit/{id}', [teacherController::class, 'edit'])->name('teachers.edit');
    Route::post('/admin/teachers', [teacherController::class, 'store'])->name('teachers.store');
    Route::delete('/admin/teachers/{id}', [teacherController::class, 'destroy'])->name('teachers.destroy');
    Route::patch('/admin/teachers/{id}', [teacherController::class, 'update'])->name('teachers.update');
});

require __DIR__ . '/auth.php';
