<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password = password
            ],
            [
                'name' => 'Jeroen Raams',
                'email' => 'jraams@avans.nl',
                'email_verified_at' => now(),
                'approved' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password = password
            ],
            [
                'name' => 'Ad Min',
                'email' => 'admin@bzn.nl',
                'email_verified_at' => now(),
                'approved' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password = password
            ]
        ]);
    }
}
