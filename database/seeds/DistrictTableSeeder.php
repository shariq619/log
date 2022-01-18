<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            [
                'region_id'      => '1',
                'name'      => 'District 1',
                'user_id'   => 4
            ],
            [
                'region_id'      => '2',
                'name'      => 'District 2',
                'user_id'   => 4
            ],
            [
                'region_id'      => '3',
                'name'      => 'District 3',
                'user_id'   => 4
            ]
        ];

        District::insert($districts);
    }
}
