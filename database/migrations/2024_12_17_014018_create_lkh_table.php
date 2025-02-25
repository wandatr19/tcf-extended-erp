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
        Schema::create('lkh', function (Blueprint $table) {
            $table->id();
            $table->integer('line');
            $table->integer('shift');
            $table->integer('customer_id')->nullable();
            $table->string('customer')->nullable();
            $table->string('part_no')->nullable();
            $table->dateTime('prod_date')->nullable();
            $table->integer('hole_ta')->nullable();
            $table->integer('hole_mencuat')->nullable();
            $table->integer('hole_geser')->nullable();
            $table->integer('hole_doubleprc')->nullable();
            $table->integer('hole_tembus')->nullable();
            $table->integer('hole_mengecil')->nullable();
            $table->integer('neck')->nullable();
            $table->integer('crack_p')->nullable();
            $table->integer('glmbg_krpt')->nullable();
            $table->integer('trim_over')->nullable();
            $table->integer('trim_min')->nullable();
            $table->integer('trim_mencuat')->nullable();
            $table->integer('bend_min')->nullable();
            $table->integer('bend_over')->nullable();
            $table->integer('emb_geser')->nullable();
            $table->integer('double_emb')->nullable();
            $table->integer('penyok_defom')->nullable();
            $table->integer('krg_stamp')->nullable();
            $table->integer('material_s')->nullable();
            $table->integer('baret_scratch')->nullable();
            $table->integer('dent')->nullable();
            $table->integer('others')->nullable();
            $table->string('dies_process')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_finish')->nullable();
            $table->integer('sampling')->nullable();
            $table->integer('total_prod')->nullable();
            $table->integer('part_ok')->nullable();
            $table->integer('part_repair')->nullable();
            $table->integer('part_reject')->nullable();
            $table->integer('verifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lkh');
    }
};
