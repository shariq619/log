<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'name'      => 'Region 1'
            ],
            [
                'name'      => 'Region 2'
            ],
            [
                'name'      => 'Region 3'
            ]
        ];

        Region::insert($roles);

    }
}
