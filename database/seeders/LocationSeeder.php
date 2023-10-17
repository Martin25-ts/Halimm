<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $listlocation = [
            [
                'location_name' => 'Universitas Bina Nusantara, Lt1',
                'location_url' => 'KmgAngLt1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'location_name' => 'Universitas Bina Nusantara, Lt3',
                'location_url' => 'KmgAngLt3',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'location_name' => 'Universitas Bina Nusantara, Lt2',
                'location_url' => 'KmgSyhLt2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('ms_locations')->insert($listlocation);
    }
}
