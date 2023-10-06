<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusLockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liststatuslocker = [
            [
                'status_locker' => 'InUse'
            ],
            [
                'status_locker' => 'Available'
            ],
            [
                'status_locker' => 'Unavailable'
            ],
        ];

        DB::table('ms_status_lockers')->insert($liststatuslocker);
    }
}
