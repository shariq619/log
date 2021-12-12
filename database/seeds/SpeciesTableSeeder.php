<?php

use App\Species;
use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sp = [
            [
                'name'      => 'Species 1'
            ],
            [
                'name'      => 'Species 2'
            ],
            [
                'name'      => 'Species 3'
            ]
        ];

        Species::insert($sp);
    }
}
