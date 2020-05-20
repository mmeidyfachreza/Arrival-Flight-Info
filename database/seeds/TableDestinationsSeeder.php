<?php

use App\City;
use Illuminate\Database\Seeder;

class TableDestinationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Bandung','Yogyakarta','Semarang'];
        foreach ($array as $item) {
            City::create(['name'=>$item]);
        }
    }
}
