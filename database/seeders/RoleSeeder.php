<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listrole = [
            [
                'role' => 'Admin'
            ],
            [
                'role' => 'Customer'
            ]
        ];

        DB::table('ms_roles')->insert($listrole);

    }
}
