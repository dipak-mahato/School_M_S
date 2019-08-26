<?php

use Illuminate\Database\Seeder;
use App\schoolclass;
class classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $class=new schoolclass;
            $class->class="one";
			  $class->save();
              $class->sections()->attach(1);
              $class->shifts()->attach(1);

            $class=new schoolclass;
            $class->class="two";
			  $class->save();
              $class->sections()->attach(2);
              $class->shifts()->attach(1);

            $class=new schoolclass;
            $class->class="three";
			  $class->save();
              $class->sections()->attach(3);
              $class->shifts()->attach(2);              
    
    }
}
