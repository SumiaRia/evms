<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Service;
class ServiceSeeder extends Seeder
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
                'name'          => 'Weeding',
                'description'   => 'Best plan for weeding',
                'rating'        =>  5
            ],
            [
                'name'          => 'Birth day',
                'description'   => 'Best plan for weeding',
                'rating'        =>  4
            ],
            [
                'name'          => 'Music',
                'description'   => 'Best plan for Musics',
                'rating'        =>  3
            ],
        ];

        foreach($services as $key => $service)
        {
            $photo_id = $key+1;
            $service = Service::create($service);
            $service->addMedia(storage_path()."/seeders/services/$photo_id.jpg")->preservingOriginal()->toMediaCollection('photo');
        }
    }
    }
