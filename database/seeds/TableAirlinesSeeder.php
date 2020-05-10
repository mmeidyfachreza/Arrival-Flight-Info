<?php

use App\Airline;
use Illuminate\Database\Seeder;

class TableAirlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Garuda','Citilink','Lion Air'];
        foreach ($array as $item) {
            Airline::create(['name'=>$item]);
        }
    }
}
