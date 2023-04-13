<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class roomClass extends Model
{
    protected $fillable = ['title'];
    protected $table = 'classes';
    use HasFactory;

    public function User()
    {
        return $this->hasMany(User::class, 'class_id');
    }
}
