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
     * 1.	Movie name (Required)
2.	Movie description (Required)
3.	Movie YouTube URL (Required)
4.	Movie Image (Laravel File Upload) 
a.	User can add/edit/remove image using jQuery and ajax 
5.	Movie Release date (date picker) (Required)
6.	Movie slug (unique name) (Required)

     */
    
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('url');
            $table->string('image')->nullable();
            $table->dateTime('release_date');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('movies');
    }
};
