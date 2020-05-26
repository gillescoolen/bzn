<?php

use Illuminate\Database\Seeder;

class TextblocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('textblocks')->insert([
            [
                'key' => 'project_explanation',
                'content' => 'Momenteel wordt met verschillende methodieken de kwaliteit van de natuur en daarmee debiodiversiteit in kaart gebracht, maar een specifieke benadering vanuit potentie voor biodiversiteitmist vaak nog. Daarom is het project biodiversiteitsstresstest gestart om op gemeentelijk niveau debiodiversiteit te kunnen scoren die wordt weergegeven in een conceptueel datamodel als de relatievebiodiversiteit kaart. Het ecologische rapport dient als ondersteuning voor het achterliggendeconceptueel datamodel, waarop de biodiversiteitpotentiekaart is gebaseerd. Er zijnbiodiversiteitcriteria en indicatoren opgesteld om de biodiversiteitpotentie en de respectievelijkebiodiversiteit te meten. De criteria en indicatoren zijn gebaseerd op het operationele begrip “Deverscheidenheid aan groenelementen in een bepaald gebied, waarbij de verschillendegroenelementen correleren met de mate van diversiteit aan en binnen soortgroepen. De mate vankwaliteit van de verschillende groenelementen wordt bepaald door de connectiviteit hiertussen en demate van verstoringen”. Dit begrip is vertaald naar factoren die de biodiversiteit kunnen beïnvloedenof verklaren en worden meegenomen in de vorm van de criteria habitatvariatie, connectiviteit,stressfactoren en kwaliteit. De daadwerkelijke biodiversiteit wordt gegeven door het criteriumsoortenrijkdom. Het conceptueel datamodel van de biodiversiteitsstresstest is opgezet om te blijvenontwikkelen, de gebruikers te ondersteunen bij het treffen van maatregelen en de relatievebiodiversiteit weer te geven. Het doel van het conceptueel datamodel is om handvaten te bieden omspecifieke biodiversiteit verhogende maatregelen te nemen waarbij het mogelijk wordt gemaakt omde biodiversiteitopgave te koppelen aan andere klimaatopgaven. Maar ook om vanuit de andereklimaatopgave de biodiversiteitopgave mee te koppelen bij het treffen van maatregelen. Het doel vande biodiversiteitsstresstest is niet om ter vervanging te dienen van meetlatten of richtlijnen maar omhierbinnen sturing te bieden in het maken van de keuzes die samenhangen met anderemaatschappelijke opgaves zoals hittestress, gezondheid en droogte/wateroverlast.'
            ],
            [
                'key' => 'project_purpose',
                'content' => 'Deze opdracht vormt onderdeel van het KCNL project Biodiversiteitsstresstest. In dit project werkt Coöperatie Bosgroep Zuid Nederland samen met verschillende partners waaronder Tauw, BOOT en een viertal gemeenten. Het doel van dit project is het ontwikkelen van een website die mensen stimuleert om maatregelen te treffen ter verhoging van de biodiversiteit. De website maakt vanuit verschillende ruimtelijke opgaven de kansen voor biodiversiteit inzichtelijk op gemeente- en lokaal niveau.'
            ]
        ]);
    }
}
