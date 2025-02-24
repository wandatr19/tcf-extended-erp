<?php

namespace Database\Seeders\MasterUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('division')->insert([
            [
                'name' => 'ADMINISTRATION',
            ],
            [
                'name' => 'ENGINEERING',
            ],
            [
                'name' => 'OPERATIONAL',
            ]
        ]);
    }
}
