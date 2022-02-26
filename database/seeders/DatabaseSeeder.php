<?php

namespace Database\Seeders;

use Database\Seeders\Studen_seeder;
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
        $this->call(Studen_seeder::class); //llamo a la clase seeder
    }
}
