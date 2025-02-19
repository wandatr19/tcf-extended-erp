<?php

namespace Database\Seeders\ChecksheetOP;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cs_op_group_shift')->insert([
            // Group Shift 1 (Waktu 3)
            [
                'org_id' => 1000001,
                'time' => '23:50',
                'group_name' => 'A1',
                'group_shift' => 'A',
            ],
            [
                'org_id' => 1000001,
                'time' => '01:30',
                'group_name' => 'A1',
                'group_shift' => 'B',
            ],
            [
                'org_id' => 1000001,
                'time' => '02:35',
                'group_name' => 'A1',
                'group_shift' => 'C',
            ],
            [
                'org_id' => 1000001,
                'time' => '04:00',
                'group_name' => 'A1',
                'group_shift' => 'D',
            ],
            [
                'org_id' => 1000001,
                'time' => '05:30',
                'group_name' => 'A1',
                'group_shift' => 'E',
            ],
            [
                'org_id' => 1000001,
                'time' => '07:15',
                'group_name' => 'A1',
                'group_shift' => 'F',
            ],
            // Group Shift 2 (Waktu 3)
            [
                'org_id' => 1000001,
                'time' => '07:35',
                'group_name' => 'A2',
                'group_shift' => 'A',
            ],
            [
                'org_id' => 1000001,
                'time' => '09:35',
                'group_name' => 'A2',
                'group_shift' => 'B',
            ],
            [
                'org_id' => 1000001,
                'time' => '11:00',
                'group_name' => 'A2',
                'group_shift' => 'C',
            ],
            [
                'org_id' => 1000001,
                'time' => '12:35',
                'group_name' => 'A2',
                'group_shift' => 'D',
            ],
            [
                'org_id' => 1000001,
                'time' => '14:00',
                'group_name' => 'A2',
                'group_shift' => 'E',
            ],
            [
                'org_id' => 1000001,
                'time' => '15:15',
                'group_name' => 'A2',
                'group_shift' => 'F',
            ],
            // Group Shift 3 (Waktu 3)
            [
                'org_id' => 1000001,
                'time' => '15:35',
                'group_name' => 'A3',
                'group_shift' => 'A',
            ],
            [
                'org_id' => 1000001,
                'time' => '16:30',
                'group_name' => 'A3',
                'group_shift' => 'B',
            ],
            [
                'org_id' => 1000001,
                'time' => '17:30',
                'group_name' => 'A3',
                'group_shift' => 'C',
            ],
            [
                'org_id' => 1000001,
                'time' => '18:35',
                'group_name' => 'A3',
                'group_shift' => 'D',
            ],
            [
                'org_id' => 1000001,
                'time' => '21:00',
                'group_name' => 'A3',
                'group_shift' => 'E',
            ],
            [
                'org_id' => 1000001,
                'time' => '23:00',
                'group_name' => 'A3',
                'group_shift' => 'F',
            ],
            // Group Shift 1 (Waktu 2)
            [
                'org_id' => 1000001,
                'time' => '07:35',
                'group_name' => 'B1',
                'group_shift' => 'A',
            ],
            [
                'org_id' => 1000001,
                'time' => '09:35',
                'group_name' => 'B1',
                'group_shift' => 'B',
            ],
            [
                'org_id' => 1000001,
                'time' => '11:30',
                'group_name' => 'B1',
                'group_shift' => 'C',
            ],
            [
                'org_id' => 1000001,
                'time' => '12:45',
                'group_name' => 'B1',
                'group_shift' => 'D',
            ],
            [
                'org_id' => 1000001,
                'time' => '15:00',
                'group_name' => 'B1',
                'group_shift' => 'E',
            ],
            [
                'org_id' => 1000001,
                'time' => '16:30',
                'group_name' => 'B1',
                'group_shift' => 'F',
            ],
            // Group Shift 2 (Waktu 2)
            [
                'org_id' => 1000001,
                'time' => '22:00',
                'group_name' => 'B2',
                'group_shift' => 'A',
            ],
            [
                'org_id' => 1000001,
                'time' => '23:30',
                'group_name' => 'B2',
                'group_shift' => 'B',
            ],
            [
                'org_id' => 1000001,
                'time' => '01:30',
                'group_name' => 'B2',
                'group_shift' => 'C',
            ],
            [
                'org_id' => 1000001,
                'time' => '02:35',
                'group_name' => 'B2',
                'group_shift' => 'D',
            ],
            [
                'org_id' => 1000001,
                'time' => '04:00',
                'group_name' => 'B2',
                'group_shift' => 'E',
            ],
            [
                'org_id' => 1000001,
                'time' => '05:30',
                'group_name' => 'B2',
                'group_shift' => 'F',
            ],
        ]);
    }
}
