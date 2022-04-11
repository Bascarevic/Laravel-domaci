<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $aseeder = new AutorSeeder();
        $dseeder = new DrzavaSeeder();
        $kseeder = new KnjigaSeeder();

        $aseeder->run();
        $dseeder->run();
        $kseeder->run();
    }
}
