<?php


use Illuminate\Database\Seeder;

class GuideTypeSeeder extends Seeder
{
    public function run() {
        DB::table('guide_types')->insert([
            [
                'name' => 'Icarus Blauwtje',
                'layer_name' => null
            ],
            [
                'name' => 'Dwergvleermuis',
                'layer_name' => null
            ],
            [
                'name' => 'Kamsalamander',
                'layer_name' => null
            ],
            [
                'name' => 'Das',
                'layer_name' => null
            ],
            [
                'name' => 'Patrijs',
                'layer_name' => null
            ],
        ]);
    }
}
