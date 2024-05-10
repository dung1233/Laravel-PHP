<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image_path')->nullable(); // Thêm cột để lưu trữ đường dẫn hình ảnh
            $table->unsignedBigInteger('user_id'); // Sử dụng unsignedBigInteger cho các khóa ngoại
            $table->foreign('user_id')->references('id')->on('users'); // Khóa ngoại tham chiếu đến cột 'id' trong bảng 'users'
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
