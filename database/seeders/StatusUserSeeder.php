<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liststatususer = [
            [
                'status_user' => 'Active'
            ],
            [
                'status_user' => 'Suspended'
            ]
        ];

        DB::table('ms_statuses_user')->insert($liststatususer);
    }
}
