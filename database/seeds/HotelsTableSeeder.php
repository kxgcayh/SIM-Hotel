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
            'name' => 'Anggrek',
            'address' => 'Jl. Raya Anggrek Merah'
        ]);
        Hotel::create([
            'city_id' => 2,
            'name' => 'Gumati',
            'address' => 'Jl. Gumati No. 14'
        ]);
        Hotel::create([
            'city_id' => 3,
            'name' => 'Melati',
            'address' => 'Jl. Melati Hitam 20'
        ]);
        Hotel::create([
            'city_id' => 4,
            'name' => 'Indonesia Kempinski ',
            'address' => 'Jl. Kempinskuy'
        ]);

        Hotel::create([
            'city_id' => 5,
            'name' => 'Sarinah',
            'address' => 'Jl. Sari Bernanah'
        ]);



    }
}
