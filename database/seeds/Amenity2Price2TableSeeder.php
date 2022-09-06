<?php

namespace Database\Seeders;
use App\Price2;
use Illuminate\Database\Seeder;

class Amenity2Price2TableSeeder extends Seeder
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
                'id' => 1,
                'amenities2' => [1, 2, 3]
            ],
            [
                'id' => 2,
                'amenities2' => [1, 2, 3, 4]
            ],
            [
                'id' => 3,
                'amenities2' => [1, 2, 3, 4, 5, 6]
            ],
        ];

        foreach($prices2 as $price2)
        {
            Price2::find($price2['id'])
                ->amenities2()
                ->sync($price2['amenities2']);
        }
    }
    
}
