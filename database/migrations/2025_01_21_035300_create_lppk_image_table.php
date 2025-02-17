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
        Schema::create('lppk_image', function (Blueprint $table) {
            $table->increments('id_lppk_image');
            $table->unsignedBigInteger('lppk_id');
            $table->string('image_name');
            $table->string('image_path');
            $table->timestamps();

            $table->softDeletes();
            $table->foreign('lppk_id')->references('id_lppk')->on('lppk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lppk_image', function (Blueprint $table) {
            //
        });
    }
};
