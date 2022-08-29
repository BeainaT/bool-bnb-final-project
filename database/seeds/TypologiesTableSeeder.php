<?php

use Illuminate\Database\Seeder;
use App\Typology;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = [
            [
                'name' => 'monolocale', 
            ],
            [
                'name' => 'appartamento', 
            ],
            [
                'name' => 'villa', 
            ],
        ];
        foreach($typologies as $typology){
            Typology::create($typology);
        };
    }
}
