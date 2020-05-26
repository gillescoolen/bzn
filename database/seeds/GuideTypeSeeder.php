<?php


use Illuminate\Database\Seeder;

class GuideTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('guide_types')->insert([
            [
                'name' => 'Icarus Blauwtje',
                'layer_name' => 'Alle_insecten_soortenrijkdom'
            ],
            [
                'name' => 'Dwergvleermuis',
                'layer_name' => 'Frag03_gewone_dwergvleermuis'
            ],
            [
                'name' => 'Kamsalamander',
                'layer_name' => 'Horst_aan_de_Maas_bgtsnl_10m'
            ],
            [
                'name' => 'Das',
                'layer_name' => 'Libellen_std'
            ],
            [
                'name' => 'Patrijs',
                'layer_name' => 'Nachtvlinders_std'
            ],
        ]);
    }
}
