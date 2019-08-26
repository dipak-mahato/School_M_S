<?php

use Illuminate\Database\Seeder;
use App\shift;
class shiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $shift=new shift;
            $shift->shift="morning";
            $shift->save();

            $shift=new shift;
            $shift->shift="day";
            $shift->save();    

            $shift=new shift;
            $shift->shift="evening";
            $shift->save();

 
    }
}
