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
        Schema::create('cs_op_header', function (Blueprint $table) {
            $table->bigIncrements('id_cs_op_header');
            $table->string('doc_number')->nullable();
            $table->integer('org_id')->nullable();
            $table->integer('karyawan_id')->nullable();
            $table->string('nama_karyawan')->nullable();
            $table->string('shift')->nullable();
            $table->dateTime('issued_at')->nullable();
            $table->date('prod_date')->nullable();
            $table->unsignedBigInteger('idem_mesin_id')->nullable();
            $table->string('nama_mesin')->nullable();
            $table->unsignedBigInteger('idem_homeline_id')->nullable();
            $table->string('nama_homeline')->nullable();
            $table->string('status_doc')->nullable();
            $table->dateTime('checked_at')->nullable();
            $table->string('checked_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cs_op_header');
    }
};
