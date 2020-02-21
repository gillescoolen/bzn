<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MunicipalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Municipality::class, 10)->create();
    }
}
