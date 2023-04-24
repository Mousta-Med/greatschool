<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['user_id', 'absenceDate'];
    use HasFactory;
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
