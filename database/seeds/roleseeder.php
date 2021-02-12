<?php

use Illuminate\Database\Seeder;

class roleseeder extends Seeder
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
                'id' => 1,
                'name' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'dokter'
            ],
            [
                'id' => 3,
                'name' => 'petugas'
            ]
        ];

        foreach ($datas as $data) {
            DB::table('role')->insert($data);
        }


    }
}
