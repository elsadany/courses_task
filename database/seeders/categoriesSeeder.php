<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            \DB::table('categories')->insert(['name'=>'cat'.\Str::random(4).$i,'active'=>1]);
        }
    }
}
