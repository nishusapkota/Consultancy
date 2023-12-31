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
        Schema::create('request_courses', function (Blueprint $table) {
            $table->id();           
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('course_categories')->onDelete('cascade');
           $table->string('name');
           $table->Text('description');
           $table->string('image');
           $table->unsignedBigInteger('university_id');
           $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
           $table->unsignedBigInteger('level_id')->nullable();
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
        Schema::dropIfExists('request_courses');
    }
};
