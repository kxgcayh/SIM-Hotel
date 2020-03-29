<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin', 'staff', 'user',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
