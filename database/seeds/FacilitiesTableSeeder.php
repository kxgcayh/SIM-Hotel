<?php

use App\Models\RoomFacility;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomFacility::create([
            'name' => 'Televisi'
        ]);

        RoomFacility::create([
            'name' => 'Wifi'
        ]);

        RoomFacility::create([
            'name' => 'Launch'
        ]);

        RoomFacility::create([
            'name' => 'Dinner'
        ]);

        RoomFacility::create([
            'name' => 'Pool'
        ]);

        RoomFacility::create([
            'name' => 'Big Bathroom'
        ]);
    }
}
