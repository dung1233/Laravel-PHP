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
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->increments('ExhibitionID');
            $table->string('Title', 255)->nullable(false);
            $table->text('Description')->nullable(false);
            $table->date('StartDate')->nullable(false);
            $table->date('EndDate')->nullable(false);
            $table->string('Location', 255)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibitions');
    }
};
