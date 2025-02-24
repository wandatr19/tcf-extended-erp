<?php

namespace Database\Seeders\MasterUser;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organization')->insert([
            [
                'name' => 'SADANG',
                'address' => 'Jl. Sadang - Subang KM 10 Kp. Karajan RT 004/001, Cibatu, Purwakarta Regency, West Java 41181'
            ],
            [
                'name' => 'KIM',
                'address' => 'Jl. Mitra Raya II No.6, Parungmulya, Kec. Ciampel, Karawang, Jawa Barat 41363'
            ],
        ]);
        
    }
}
