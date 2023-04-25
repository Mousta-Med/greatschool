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
}
