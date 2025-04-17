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
        Schema::create('post_photo', function (Blueprint $table) {

            $table->timestamps();
            $table->unsignedBigInteger('post_id')->unsigned();
            $table->unsignedBigInteger('photo_id')->unsigned();
            $table->primary(['post_id' , 'photo_id']);
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('photo_id')->references('id')->on('photos');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
