<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\ChecksheetOP\PointSPVSeeder;
use Database\Seeders\ChecksheetOP\GroupShiftSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'userquality',
        //     'email' => 'quality@gmail.com',
        //     'department' => 'Quality',
        //     'password' => Hash::make('userquality'),
        // ]);
        // User::factory()->create([
        //     'name' => 'userengineering',
        //     'email' => 'engineering@gmail.com',
        //     'department' => 'Engineering',
        //     'password' => Hash::make('userengineering'),
        // ]);

        // $this->call(LKHseeder::class);
        $this->call([
            PointSPVSeeder::class,
            GroupShiftSeeder::class,
        ]);
    }
}
