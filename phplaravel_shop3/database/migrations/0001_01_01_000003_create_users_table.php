<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Tạo bảng users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Hoặc $table->id('UserID'); nếu bạn muốn tùy chỉnh tên cột ID
            $table->string('name'); // Thay đổi này nếu bạn muốn sử dụng 'Username' như trong đoạn mã thứ hai
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Các cột bổ sung từ đoạn mã thứ hai
            $table->unsignedBigInteger('UserType'); // Đảm bảo rằng bạn đã tạo bảng 'user_types'
            $table->foreign('UserType')->references('TypeID')->on('user_types');
            $table->string('FullName', 255)->nullable();
            $table->string('PhoneNumber', 20)->nullable();
        });

        // Tạo bảng password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tạo bảng sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index()->constrained()->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_types'); // Đảm bảo xóa đúng thứ tự để không vi phạm ràng buộc khóa ngoại
    }
};

