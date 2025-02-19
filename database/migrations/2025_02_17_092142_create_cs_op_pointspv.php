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
        Schema::create('cs_op_pointspv', function (Blueprint $table) {
            $table->bigIncrements('id_cs_op_pointspv');
            $table->integer('org_id')->nullable();
            $table->string('order_no');
            $table->text('name');
            $table->string('group')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_op_pointspv');
    }
};
