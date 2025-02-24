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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->nullable()->after('email');
            $table->string('employee_name')->nullable()->after('nik');
            $table->integer('org_id')->nullable()->after('employee_name');
            $table->integer('div_id')->nullable()->after('org_id');
            $table->integer('dept_id')->nullable()->after('div_id');
            $table->integer('section_id')->nullable()->after('dept_id');
            $table->integer('position_id')->nullable()->after('section_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nik',
                'employee_name',
                'org_id',
                'div_id',
                'dept_id',
                'section_id',
                'position_id'
            ]);
        });
    }
};
