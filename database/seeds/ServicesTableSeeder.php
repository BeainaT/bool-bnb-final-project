<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'climatizzato',
                'type' => 'essenziali',
                'icone' => Null,
            ],
            [
                'name' => 'lavatrice',
                'type' => 'essenziali',
                'icone' => Null,
            ],
            [
                'name' => 'tv',
                'type' => 'essenziali',
                'icone' => Null,
            ],
            [
                'name' => 'asciugacapelli',
                'type' => 'essenziali',
                'icone' => Null,
            ],
            [
                'name' => 'cucina',
                'type' => 'essenziali',
                'icone' => Null,
            ],
            [
                'name' => 'Wi-Fi',
                'type' => 'essenziali',
                'icone' => Null,
            ],
            [
                'name' => 'piscina',
                'type' => 'premium',
                'icone' => Null,
            ],
            [
                'name' => 'idromassaggio',
                'type' => 'premium',
                'icone' => Null,
            ],
            [
                'name' => 'palestra',
                'type' => 'premium',
                'icone' => Null,
            ],
            [
                'name' => 'camino',
                'type' => 'premium',
                'icone' => Null,
            ],
            [
                'name' => 'griglia per barbecue',
                'type' => 'premium',
                'icone' => Null,
            ],
        ];

        foreach($services as $service) {
            Service::create($service);
        }
    }
}
