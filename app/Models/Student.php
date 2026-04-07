<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // 1 Student -> nhiều Enrollment 
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Quan hệ Many-to-Many với Course [cite: 163]
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}
