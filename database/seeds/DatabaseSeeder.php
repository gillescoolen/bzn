<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LegendSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LayerSeeder::class);
        $this->call(GuideTypeSeeder::class);
        $this->call(MeasureSeeder::class);
        $this->call(StatementSeeder::class);
        $this->call(MunicipalityStatementSeeder::class);
        $this->call(TextblocksSeeder::class);
        $this->call(PartnersSeeder::class);
    }
}
