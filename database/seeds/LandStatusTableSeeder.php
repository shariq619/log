<?php


use App\LandStatus;
use Illuminate\Database\Seeder;

class LandStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ls = [
            [
                'name'      => 'Status 1'
            ],
            [
                'name'      => 'Status 2'
            ],
            [
                'name'      => 'Status 3'
            ]
        ];

        LandStatus::insert($ls);
    }
}
