<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Turahe\Master\Seeds\CountriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            CountriesTableSeeder::class,
            RajaOngkirTableSeeder::class,
            SicepatTableSeeder::class,
            TikiTableSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
