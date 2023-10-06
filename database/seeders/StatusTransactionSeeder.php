<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liststatustransaction = [
            [
                'status_transaction' => 'InProgres'
            ],
            [
                'status_transaction' => 'InProgres'
            ],
        ];

        DB::table('ms_status_transactions')->insert($liststatustransaction);
    }
}
