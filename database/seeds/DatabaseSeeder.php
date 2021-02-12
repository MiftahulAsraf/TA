<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(roleseeder::class);
        $this->call(adminSeeder::class);
        $this->call(dokterSeeder::class);
    }
}
