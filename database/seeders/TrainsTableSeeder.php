<?php

namespace Database\Seeders;

use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{

    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {

            $newTrain = new Train();
            
            $compagnie = ['Trenitalia', 'Italo (NTV)', 'Trenord', 'Ferrotramviaria', 'Ferrovie del Sud Est', 'Ferrovie della Calabria', 'SNCF Voyageurs Italia'];
            $tipologie = ['Regionale', 'Regionale Veloce', 'Intercity', 'Frecciarossa', 'Frecciargento', 'Frecciabianca', 'Eurocity', 'Italo'];
            $partenza = $faker->dateTimeBetween('now', '+3 days');

            $newTrain->azienda = $faker->randomElement($compagnie);
            $newTrain->tipo_treno = $faker->randomElement($tipologie);
            $newTrain->stazione_partenza = $faker->city();
            $newTrain->binario_partenza = $faker->numberBetween(1, 24);
            $newTrain->stazione_arrivo = $faker->city();
            $newTrain->orario_partenza = $partenza;
            $newTrain->orario_arrivo = $faker->dateTimeBetween($partenza, $partenza->format('Y-m-d H:i:s') . ' +5 hours');
            $newTrain->codice_treno = $faker->bothify('??####');
            $newTrain->totale_carrozze = $faker->numberBetween(5, 12);
            $newTrain->in_orario = $faker->boolean(70);
            if (!$newTrain->in_orario) {
                $newTrain->minuti_ritardo = $faker->numberBetween(5, 180);
            } else {
                $newTrain->minuti_ritardo = 0;
            }
            $newTrain->cancellato = $faker->boolean(5);

            $newTrain->save();
        }
    }
}
