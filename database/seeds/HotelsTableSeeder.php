<?php

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'city_id' => 1,
            'name' => 'Hotel Anggrek',
        ]);
        Hotel::create([
            'city_id' => 1,
            'name' => 'Hotel Gumati',
        ]);
        Hotel::create([
            'city_id' => 1,
            'name' => 'Hotel Melati',
        ]);
        Hotel::create([
            'city_id' => 1,
            'name' => 'Hotel Indonesia Kempinski ',
        ]);

        Hotel::create([
            'city_id' => 1,
            'name' => 'Hotel Jakarta',
        ]);



    }
}
