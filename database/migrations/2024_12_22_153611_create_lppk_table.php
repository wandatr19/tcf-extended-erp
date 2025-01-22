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
        Schema::create('lppk', function (Blueprint $table) {
            $table->increments('id_lppk');
            $table->string('no_lppk');
            $table->string('part_code')->nullable();
            $table->string('part_name')->nullable();
            $table->string('part_type')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('partner')->nullable();
            $table->date('issued_date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->string('material')->nullable();
            $table->string('lot_material')->nullable();
            $table->string('quantity')->nullable();
            $table->string('problem_type')->nullable();
            $table->text('problem_desc')->nullable();
            $table->string('status_doc')->nullable();
            $table->string('approval_doc')->nullable();
            $table->text('repair_desc')->nullable();
            $table->string('action_status')->nullable();
            $table->text('analyze_why')->nullable();
            $table->string('temp_action')->nullable();
            $table->text('perm_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lppk');
    }
};
