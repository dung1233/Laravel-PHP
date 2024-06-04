<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('exhibition_entries', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Bạn có thể thay đổi 'pending' thành giá trị khác nếu muốn
        });
    }

    public function down()
    {
        Schema::table('exhibition_entries', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
