<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Category::all() as $one){
            for($i=0;$i<10;$i++){
                \DB::table('courses')->insert(['name'=>'course'.\Str::random(20).$i,'description'=>'DEscription Course'.\Str::random(80).$i,
                    'category_id'=>$one->id,'rating'=>($i<6)?$i:($i-5),'views'=>($i*5),'hours'=>$i+20,'active'=>1,'levels'=>levels[$i%3]]);
            }
        } 
    }
}
