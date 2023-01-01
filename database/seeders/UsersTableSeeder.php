<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            User::create([
                'firstname' => 'John',
                'lastname' => 'Doe',
                'sex' => 1,
                'birthdate' => '2022-10-10',
                'address' => 'Dump City, Province',
                'phone_number' => '093834238',
                'username' => 'johndoe',
                'role' => '1',
                'email' => 'johndoe@testemail.com',
                'password' => bcrypt('password')
            ]);

            User::create([
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'sex' => 1,
                'birthdate' => '2022-10-10',
                'address' => 'Dump City, Province',
                'phone_number' => '094378434',
                'username' => 'janedoe',
                'role' => '1',
                'email' => 'janedoe@testemail.com',
                'password' => bcrypt('password')
            ]);
    }
}
