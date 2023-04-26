<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'teacher_id', 'exam1', 'exam2', 'exam3', 'examTotal'];

    public function User()
    {
        return $this->belongsTo(User::class, 'student_id');
    }


    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->where('role', 'teacher');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id')->where('role', 'student');
    }
}
