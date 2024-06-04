<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('exhibition_entries', function (Blueprint $table) {
            $table->id(); // Tạo ID tự động tăng cho mỗi bài đăng
            $table->unsignedBigInteger('user_id'); // ID của người dùng đăng bài
            $table->unsignedInteger('exhibition_id'); // ID của sự kiện mà bài đăng thuộc về
            $table->string('image_path'); // Đường dẫn lưu hình ảnh của bài đăng
            $table->text('description')->nullable(); // Mô tả bài đăng, có thể không có
            $table->timestamps(); // Thời gian tạo và cập nhật bài đăng

            // Thiết lập khóa ngoại tham chiếu đến bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Thiết lập khóa ngoại tham chiếu đến bảng exhibitions
            $table->foreign('exhibition_id')->references('ExhibitionID')->on('exhibitions')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('exhibition_entries');
    }
};
