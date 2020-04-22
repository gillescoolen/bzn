<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Tijs Verbeek',
                'email' => 'tijsverbeek@gmail.com',
                'email_verified_at' => now(),
                'approved' => 1,
                'role' => 'moderator',
                'api_token' => Str::random(60),
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Jeroen Raams',
                'email' => 'jraams@avans.nl',
                'email_verified_at' => now(),
                'approved' => 1,
                'role' => 'moderator',
                'api_token' => Str::random(60),
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Ad Min',
                'email' => 'admin@bzn.nl',
                'email_verified_at' => now(),
                'approved' => 1,
                'role' => 'admin',
                'api_token' => Str::random(60),
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Nota P. Proved',
                'email' => 'notapproved@bzn.nl',
                'email_verified_at' => now(),
                'approved' => 0,
                'role' => 'gebruiker',
                'api_token' => Str::random(60),
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Gemeen T.E.',
                'email' => 'gemeente@bzn.nl',
                'email_verified_at' => now(),
                'approved' => 0,
                'role' => 'gebruiker',
                'api_token' => Str::random(60),
                'password' => bcrypt('password')
            ]
        ]);
    }
}
