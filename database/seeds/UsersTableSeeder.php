<?php

use App\Models\User;
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
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Muhammad Rizkianda',
            'username' => 'mrizkianda',
            'telp' => '080100000000',
            'email' => 'staff@hotel.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name' => 'Nurmilla Latuapo',
            'username' => 'lapotuak',
            'telp' => '080200000000',
            'email' => 'user@hotel.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
