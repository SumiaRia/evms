<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Price2;
class Prices2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices2 = [
            [
                'name'  => 'Standard Access',
                'price' => 150
            ],
            [
                'name'  => 'Pro Access',
                'price' => 250
            ],
            [
                'name'  => 'Premium Access',
                'price' => 350
            ],
        ];

        foreach($prices2 as $price2)
        {
            Price2::create($price2);
        }
    }
}
