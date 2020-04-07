<?php

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name' => 'Jawa Barat'
        ]);

        Province::create([
            'name' => 'Jawa Timur'
        ]);

        Province::create([
            'name' => 'Jawa Tengah'
        ]);
    }
}
