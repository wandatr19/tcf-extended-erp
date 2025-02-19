<?php

namespace Database\Seeders\ChecksheetOP;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PointSPVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cs_op_pointspv')->insert([
            [
                'org_id' => 1000001,
                'order_no' => '1',
                'name' => 'Operator siap di Mesin dgn Alat Safety (APD)',
                'group' => 'A',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '2',
                'name' => 'WI terpasang & Operator konsisten mematuhi WI yang ada',
                'group' => 'A',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '3',
                'name' => 'Verifikasi setting dilakukan',
                'group' => 'A',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '4',
                'name' => 'Label status part terpasang',
                'group' => 'B',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '5',
                'name' => 'Pengecheckan Kualitas oleh Operator',
                'group' => 'B',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '6',
                'name' => 'WI terpasang & Operator konsisten mematuhi WI yang ada',
                'group' => 'B',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '7',
                'name' => 'Penempatan NG di Box Merah',
                'group' => 'B',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '8',
                'name' => 'Pengecheckan kestabilan setting',
                'group' => 'B',
            ],
            // Group C
            [
                'org_id' => 1000001,
                'order_no' => '9',
                'name' => 'Label status part terpasang',
                'group' => 'C',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '10',
                'name' => 'Pengecheckan Kualitas oleh Operator',
                'group' => 'C',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '11',
                'name' => 'WI terpasang & Operator konsisten mematuhi WI yang ada',
                'group' => 'C',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '12',
                'name' => 'Penempatan NG di Box Merah',
                'group' => 'C',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '13',
                'name' => 'Pengecheckan kestabilan setting',
                'group' => 'C',
            ],
            // Group D
            [
                'org_id' => 1000001,
                'order_no' => '14',
                'name' => 'Operator siap di Mesin dgn Alat Safety (APD)',
                'group' => 'D',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '15',
                'name' => 'Pengecekan Kualitas oleh Operator',
                'group' => 'D',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '16',
                'name' => 'WI terpasang & Operator konsisten mematuhi WI yang ada',
                'group' => 'D',
            ],
            // Group E
            [
                'org_id' => 1000001,
                'order_no' => '17',
                'name' => 'Label status part terpasang',
                'group' => 'E',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '18',
                'name' => 'Pengecheckan Kualitas oleh Operator',
                'group' => 'E',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '19',
                'name' => 'WI terpasang & Operator konsisten mematuhi WI yang ada',
                'group' => 'E',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '20',
                'name' => 'Penempatan NG di Box Merah',
                'group' => 'E',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '21',
                'name' => 'Pengecheckan kestabilan setting',
                'group' => 'E',
            ],
            // Group F
            [
                'org_id' => 1000001,
                'order_no' => '22',
                'name' => 'Pemindahan part NG',
                'group' => 'F',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '23',
                'name' => 'Buat Laporan Kerja Harian',
                'group' => 'F',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '24',
                'name' => '5S dan Buang Sampah',
                'group' => 'F',
            ],
            [
                'org_id' => 1000001,
                'order_no' => '25',
                'name' => 'Laporan pencapaian target & permasalahannya',
                'group' => 'F',
            ]

        ]);
    }
}
