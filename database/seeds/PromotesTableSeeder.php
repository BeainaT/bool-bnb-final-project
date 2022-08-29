<?php

use Illuminate\Database\Seeder;
use App\Promote;

class PromotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $promotes = [
            [
                'name' => 'Base',
                'price' => 2.99,
                'duration' => 24,
            ],
            [
                'name' => 'Standard',
                'price' => 5.99,
                'duration' => 72,
            ],
            [
                'name' => 'Premium',
                'price' => 9.99,
                'duration' => 144,
            ],
        ];
        foreach($promotes as $promote){
            Promote::create($promote);
        }  
    }
}
