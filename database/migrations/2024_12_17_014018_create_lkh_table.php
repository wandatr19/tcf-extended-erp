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
            $table->string('customer');
            $table->string('part_no');
            $table->dateTime('prod_date');
            $table->integer('hole_ta');
            $table->integer('hole_tembus');
            $table->integer('hole_mengecil');
            $table->integer('neck');
            $table->integer('crack_p');
            $table->integer('glmbg_krpt');
            $table->integer('trim_over');
            $table->integer('trim_min');
            $table->integer('trim_mencuat');
            $table->integer('bend_min');
            $table->integer('bend_over');
            $table->integer('emb_geser');
            $table->integer('double_emb');
            $table->integer('penyok_defom');
            $table->integer('krg_stamp');
            $table->integer('material_s');
            $table->integer('baret_scratch');
            $table->integer('dent');
            $table->integer('others');
            $table->string('dies_process');
            $table->time('time_start');
            $table->time('time_finish');
            $table->integer('sampling');
            $table->integer('total_prod');
            $table->integer('part_ok');
            $table->integer('part_repair');
            $table->integer('part_reject');
            $table->integer('verifikasi');
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
