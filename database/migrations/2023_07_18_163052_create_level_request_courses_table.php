<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_request_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_course_id');
            $table->unsignedBigInteger('level_id');
            $table->foreign('request_course_id')->references('id')->on('request_courses')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_request_courses');
    }
};
