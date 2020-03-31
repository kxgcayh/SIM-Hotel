<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'province_id' => 1,
            'name' => 'Bogor',
        ]);

        City::create([
            'province_id' => 1,
            'name' => 'Sukabumi',
        ]);

        City::create([
            'province_id' => 1,
            'name' => 'Bandung'
        ]);

        City::create([
            'province_id' => 1,
            'name' => 'Banten'
        ]);

        City::create([
            'province_id' => 2,
            'name' => 'Yogyakarta'
        ]);
    }
}
