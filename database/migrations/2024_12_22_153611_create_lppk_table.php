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
            $table->id();
            $table->string('no_lppk');
            $table->string('part_no');
            $table->string('part_name');
            $table->string('type')->nullable();
            $table->string('issued_by')->nullable();
            $table->date('issued_date')->nullable();
            $table->string('material')->nullable();
            $table->string('lot_material')->nullable();
            $table->string('quantity')->nullable();
            $table->string('problem_type')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->text('repair_desc')->nullable();
            $table->string('action')->nullable();
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
