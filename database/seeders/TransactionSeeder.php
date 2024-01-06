<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        // $list_of_transaction = [
        //     'transaction_data' => $now,
        //     'user_id' => 1,
        //     'status_transaction_id' => 1,
        // ];

        // DB::table('transactions')->insert($list_of_transaction);

    }
}
