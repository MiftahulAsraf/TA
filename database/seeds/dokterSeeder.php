<?php

use Illuminate\Database\Seeder;

class dokterSeeder extends Seeder
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
                'id_users' => 'DKTR1',
                'username' => 'dokter',
                'nama_user' => 'Dokter',
                'password' => 'dokter',
                'id_role' => 2
            ],
            [
                'id_users' => 'DKTR2',
                'username' => 'dokter2',
                'nama_user' => 'Dokter 2',
                'password' => 'dokter',
                'id_role' => 2
            ]
        ];

        foreach ($datas as $data) {
            DB::table('users')->insert($data);
        }
    }
}
