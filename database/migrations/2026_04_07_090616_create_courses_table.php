<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên khóa học
            $table->string('slug')->unique(); // Slug tự sinh
            $table->decimal('price', 10, 2); // Giá
            $table->text('description')->nullable(); // Mô tả
            $table->string('image')->nullable(); // Ảnh
            $table->enum('status', ['draft', 'published'])->default('draft'); // Trạng thái
            $table->softDeletes(); // Yêu cầu Xóa mềm (Soft Delete)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
