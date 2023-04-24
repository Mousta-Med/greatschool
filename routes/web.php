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


//home
Route::get('/home', [Homecontroller::class, 'index'])->name('home');
Route::get('/', [Homecontroller::class, 'index'])->name('home');
//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//admin
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
//teacher
Route::middleware('teacher')->group(function () {
    Route::get('teacher', [teacherController::class, 'home'])->name('teacher');
    Route::get('teacher/student/{id}', [teacherController::class, 'manage'])->name('manageStudent');
    Route::post('teacher/absence/{id}', [teacherController::class, 'absence'])->name('absence');
});
//student
Route::middleware('student')->group(function () {
    Route::get('student', [StudentController::class, 'home'])->name('student');
});
require __DIR__ . '/auth.php';
