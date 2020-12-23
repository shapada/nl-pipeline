<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

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
                'id'    => 1,
                'name' => 'Appraisal',
            ],
            [
                'id'    => 2,
                'name' => 'Flood',
            ],
            [
                'id'    => 3,
                'name' => 'Title',
            ],
        ];

        Service::insert( $services );
    }
}
