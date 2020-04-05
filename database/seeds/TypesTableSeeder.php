<?php

use App\Models\RoomType as Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Mewah'
        ]);

        Type::create([
            'name' => 'Klasik'
        ]);

        Type::create([
            'name' => 'Sederhana'
        ]);
    }
}
