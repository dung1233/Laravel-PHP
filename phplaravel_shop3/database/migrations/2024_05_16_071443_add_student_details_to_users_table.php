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
        Schema::table('users', function (Blueprint $table) {
            $table->string('StudentCode', 20)->nullable()->after('password'); // Mã sinh viên
            $table->string('Class', 50)->nullable()->after('StudentCode'); // Lớp học
            $table->string('Hometown', 100)->nullable()->after('Class'); // Quê quán
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('StudentCode');
            $table->dropColumn('Class');
            $table->dropColumn('Hometown');
        });
    }
};
