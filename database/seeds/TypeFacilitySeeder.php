<?php

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class TypeFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeMewah = RoomType::find(1);
        $mewah = [1, 2, 3, 4, 5, 6];
        $typeMewah->facilities()->attach($mewah);

        $typeKlasik = RoomType::find(2);
        $klasik = [1, 2, 3, 4, 6];
        $typeKlasik->facilities()->attach($klasik);

        $typeSederhana = RoomType::find(2);
        $klasik = [1, 2, 3];
        $typeSederhana->facilities()->attach($klasik);
    }
}
