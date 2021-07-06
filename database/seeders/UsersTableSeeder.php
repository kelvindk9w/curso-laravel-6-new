<?php

namespace Database\Seeders;

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
            'name' => 'Kelvin Medeiros',
            'email' => 'kelvindk9@gmail.com',
            'password' => bcrypt('123')
        ]);
    }
}
