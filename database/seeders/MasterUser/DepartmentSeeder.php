<?php

namespace Database\Seeders\MasterUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            [
                'division_id' => 1,
                'name' => 'HRD & GA',
            ],
            [
                'division_id' => 1,
                'name' => 'ICT',
            ],
            [
                'division_id' => 1,
                'name' => 'MARKETING',
            ],
            [
                'division_id' => 1,
                'name' => 'PURCHASING',
            ],
            [
                'division_id' => 1,
                'name' => 'FINANCE ACCOUNTING & TAX',
            ],
            [
                'division_id' => 1,
                'name' => 'QMR',
            ],
            [
                'division_id' => 2,
                'name' => 'TOOL MAKING',
            ],
            [
                'division_id' => 2,
                'name' => 'RESEARCH & DEVELOPMENT',
            ],
            [
                'division_id' => 2,
                'name' => 'MANUFACTURING',
            ],
            [
                'division_id' => 2,
                'name' => 'DRAWING',
            ],
            [
                'division_id' => 3,
                'name' => 'PPIC',
            ],
            [
                'division_id' => 3,
                'name' => 'PRODUCTION',
            ],
            [
                'division_id' => 3,
                'name' => 'QUALITY CONTROL',
            ],
            [
                'division_id' => 3,
                'name' => 'MAINTENANCE',
            ],
            [
                'division_id' => 2,
                'name' => 'ENGINEERING',
            ],
            [
                'division_id' => 2,
                'name' => 'PRODUCTION ENGINEERING',
            ],
            [
                'division_id' => 2,
                'name' => 'TOOL SERVICE',
            ],
            [
                'division_id' => 3,
                'name' => 'JISHUKEN',
            ]
        ]);
    }
}
