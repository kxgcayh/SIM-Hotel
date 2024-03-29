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
        $this->call([
            UsersTableSeeder::class,
            LevelsAndAccessSeeder::class,
            ProvincesTableSeeder::class,
            CitiesTableSeeder::class,
            HotelsTableSeeder::class,
            FacilitiesTableSeeder::class,
            TypesTableSeeder::class,
            TypeFacilitySeeder::class
        ]);
    }
}
