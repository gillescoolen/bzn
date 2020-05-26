<?php

use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert([
            [
                'name' => 'Avans Hogeschool',
                'image_path' => 'avans.png',
                'website_url' => 'https://www.avans.nl/'
            ],
            [
                'name' => 'Boot',
                'image_path' => 'boot.png',
                'website_url' => null
            ],
            [
                'name' => 'Bosgroep Zuid Nederland',
                'image_path' => 'bosgroep-zuid-nederland.png',
                'website_url' => 'https://bosgroepen.nl/bosgroep-zuid-nederland/'
            ],
            [
                'name' => 'Citaverde College',
                'image_path' => 'citaverde.png',
                'website_url' => 'https://www.citaverde.nl/'
            ],
            [
                'name' => 'Gemeente Den Haag',
                'image_path' => 'gemeente-den-haag.png',
                'website_url' => 'https://www.denhaag.nl/nl.htm'
            ],
            [
                'name' => 'Gemeente Horst',
                'image_path' => 'gemeente-horst.png',
                'website_url' => 'https://www.horstaandemaas.nl/'
            ],
            [
                'name' => 'Gemeente Tilburg',
                'image_path' => 'gemeente-tilburg.png',
                'website_url' => 'https://www.tilburg.nl/'
            ],
            [
                'name' => 'Gemeente Weert',
                'image_path' => 'gemeente-weert.png',
                'website_url' => 'https://www.weert.nl/'
            ],
            [
                'name' => 'Has Hogeschool',
                'image_path' => 'has.png',
                'website_url' => 'https://www.hashogeschool.nl/'
            ],
            [
                'name' => 'Helicon Opleidingen',
                'image_path' => 'helicon.png',
                'website_url' => 'https://www.helicon.nl/'
            ],
            [
                'name' => 'KennisCentrum Natuur en Leefomgeving',
                'image_path' => 'kenniscentrum-natuur-en-leefomgeving.png',
                'website_url' => 'https://www.kcnl.nl/nl/kcnl.htm'
            ],
            [
                'name' => 'Provincie Limburg',
                'image_path' => 'provincie-limburg.png',
                'website_url' => 'https://www.limburg.nl/'
            ],
            [
                'name' => 'Staatsbosbeheer',
                'image_path' => 'staatsbosbeheer.png',
                'website_url' => 'https://www.staatsbosbeheer.nl/'
            ],
            [
                'name' => 'Tauw',
                'image_path' => 'tauw.png',
                'website_url' => 'https://www.tauw.nl/'
            ],
            [
                'name' => 'Van Hall Larenstein',
                'image_path' => 'van-hall-larenstein.png',
                'website_url' => 'https://www.hvhl.nl/'
            ]
        ]);
    }
}
