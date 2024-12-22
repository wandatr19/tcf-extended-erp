<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LKHmodel;

class LKHseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LKHmodel::factory()->count(300)->create();
    }
}
