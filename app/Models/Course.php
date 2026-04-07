<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Gọi thư viện Xóa mềm [cite: 155]

class Course extends Model
{
    use HasFactory, SoftDeletes; // Kích hoạt Xóa mềm [cite: 155]

    protected $fillable = ['name', 'slug', 'price', 'description', 'image', 'status'];

    // 1 Course -> nhiều Lesson (hasMany) 
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // 1 Course -> nhiều Enrollment (hasMany) [cite: 160]
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Quan hệ Many-to-Many với Student thông qua bảng enrollments [cite: 163]
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }
}
