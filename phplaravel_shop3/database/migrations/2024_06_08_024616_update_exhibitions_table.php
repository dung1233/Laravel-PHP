<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExhibitionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('exhibitions', function (Blueprint $table) {
            $table->dateTime('StartDate')->change();
            $table->dateTime('EndDate')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exhibitions', function (Blueprint $table) {
            $table->date('StartDate')->change();
            $table->date('EndDate')->change();
        });
    }
}
