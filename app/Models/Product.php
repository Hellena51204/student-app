<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Khai báo mảng $fillable BẮT BUỘC để dùng được hàm create()
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'category_id'
    ];

    // Quan hệ: Product thuộc về 1 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
