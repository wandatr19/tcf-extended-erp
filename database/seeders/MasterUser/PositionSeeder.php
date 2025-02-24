<?php

namespace Database\Seeders\MasterUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('position')->insert([
            [
                'name' => 'BOD',
            ],
            [
                'name' => 'DIVISION/PLANT HEAD',
            ],
            [
                'name' => 'DEPARTMENT HEAD',
            ],
            [
                'name' => 'SECTION HEAD',
            ],
            [
                'name' => 'LEADER',
            ],
            [
                'name' => 'PELAKSANA',
            ],
        ]);
    }
}
