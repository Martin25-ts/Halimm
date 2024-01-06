<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        // $list_detail_transaction = [
        //     [
        //         'transaction_id' => 1,
        //         'duratino' => 120,
        //         'locker_id' => 1,
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'transaction_id' => 1,
        //         'duratino' => 120,
        //         'locker_id' => 2,
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'transaction_id' => 1,
        //         'duratino' => 120,
        //         'locker_id' => 3,
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        // ];

        // DB::table('transactions')->insert($list_of_transaction);
    }
}
