<?php

use Illuminate\Database\Seeder;
use App\section;
class sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $section=new section;
            $section->section="A";
            $section->save();

            $section=new section;
            $section->section="B";
            $section->save();    

            $section=new section;
            $section->section="C";
            $section->save();

    }
}
