<?php

use Illuminate\Database\Seeder;

class LayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('layers')->insert([
            [
                'name' => 'Alle_insecten_soortenrijkdom',
            ],
            [
                'name' => 'Alle_insecten_std',
            ],
            [
                'name' => 'Amfibieen_std',
            ],
            [
                'name' => 'Dagvlinders_std',
            ],
            [
                'name' => 'Frag03_gewone_dwergvleermuis',
            ],
            [
                'name' => 'Frag09_gewone_dwergvleermuis',
            ],
            [
                'name' => 'Geleedpotigen_excl_insecten_std',
            ],
            [
                'name' => 'Gewone_dwergvleermuis_Stressfactoren',
            ],
            [
                'name' => 'Habitat_gewone_dwergvleermuis',
            ],
            [
                'name' => 'Horst_aan_de_Maas_bgtsnl_10m',
            ],
            [
                'name' => 'Horst_aan_de_Maas_bgtsnl_gr01_10m',
            ],
            [
                'name' => 'Horst_aan_de_Maas_bgtsnl_gr02_10m',
            ],
            [
                'name' => 'Horst_aan_de_Maas_bgtsnl_gr03_10m',
            ],
            [
                'name' => 'Korstmossen_std',
            ],
            [
                'name' => 'Libellen_std',
            ],
            [
                'name' => 'Nachtvlinders_std',
            ],

        ]);
    }
}
