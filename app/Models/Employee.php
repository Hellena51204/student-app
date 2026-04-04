<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Thêm 2 thuộc tính này vào
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'position'
    ];
    // Bổ sung hàm này vào app/Models/Employee.php
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
