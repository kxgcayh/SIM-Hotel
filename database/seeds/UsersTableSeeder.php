<?php

use App\Models\User;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kautsar Albana',
            'username' => 'kautsaralbaa',
            'telp' => '085880846013',
            'email' => 'admin@hotel.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
