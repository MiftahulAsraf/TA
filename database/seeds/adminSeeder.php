<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'id_users' => 'ADM1',
                'username' => 'admin',
                'nama_user' => 'admin',
                'password' => bcrypt('admin'),
                'id_role' => 1
            ],
            [
                'id_users' => 'AMD2',
                'username' => 'admin2',
                'nama_user' => 'Admin 2',
                'password' => bcrypt('admin'),
                'id_role' => 1
            ]
        ];

        foreach ($datas as $data) {
            DB::table('users')->insert($data);
        }
    }
}
