<?php

namespace Database\Seeders\MasterUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('section')->insert([
            [
                'department_id' => 1,
                'name' => 'GENERAL AFFAIR',
            ],
            [
                'department_id' => 1,
                'name' => 'HR DEVELOPMENT',
            ],
            [
                'department_id' => 2,
                'name' => 'ICT',
            ],
            [
                'department_id' => 3,
                'name' => 'MARKETING',
            ],
            [
                'department_id' => 4,
                'name' => 'PURCHASING',
            ],
            [
                'department_id' => 12,
                'name' => 'PRODUCTION',
            ],
            [
                'department_id' => 11,
                'name' => 'PPIC',
            ],
            [
                'department_id' => 13,
                'name' => 'QUALITY',
            ],
            [
                'department_id' => 6,
                'name' => 'QMR',
            ],
            [
                'department_id' => 14,
                'name' => 'MAINTENANCE',
            ],
            [
                'department_id' => 8,
                'name' => 'R & D',
            ],
            [
                'department_id' => 16,
                'name' => 'PE',
            ],
            [
                'department_id' => 7,
                'name' => 'TM',
            ],
            [
                'department_id' => 17,
                'name' => 'TS',
            ],
            [
                'department_id' => 5,
                'name' => 'FA & TAX',
            ],
            [
                'department_id' => 18,
                'name' => 'JISHUKEN',
            ],
        ]);
    }
}
