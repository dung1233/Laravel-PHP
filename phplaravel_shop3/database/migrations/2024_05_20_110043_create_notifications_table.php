<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();  // ID tự động tăng cho mỗi thông báo
            $table->unsignedBigInteger('user_id');  // ID của người dùng nhận thông báo
            $table->string('title');  // Tiêu đề của thông báo
            $table->text('message');  // Nội dung thông báo
            $table->boolean('read')->default(false);  // Trạng thái đã đọc hay chưa
            $table->timestamps();  // Thời gian tạo và cập nhật thông báo

            // Thiết lập khóa ngoại tham chiếu đến bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('notifications');
    }
};
