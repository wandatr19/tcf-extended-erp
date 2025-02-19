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
        Schema::create('cs_op_line', function (Blueprint $table) {
            $table->bigIncrements('id_cs_op_line');
            $table->unsignedBigInteger('cs_op_header_id')->nullable();
            $table->unsignedBigInteger('cs_op_pointspv_id')->nullable();
            $table->unsignedBigInteger('cs_op_group_shift_id')->nullable();
            $table->integer('org_id')->nullable();
            $table->string('status')->nullable();
            $table->string('checked_at')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('cs_op_header_id')->references('id_cs_op_header')->on('cs_op_header');
            $table->foreign('cs_op_pointspv_id')->references('id_cs_op_pointspv')->on('cs_op_pointspv');
            $table->foreign('cs_op_group_shift_id')->references('id_cs_op_group_shift')->on('cs_op_group_shift');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_op_line');
    }
};
