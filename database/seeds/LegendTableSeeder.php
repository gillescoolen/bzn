<?php

use Illuminate\Database\Seeder;

class LegendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Legend::class, 5)->create();
    }
}