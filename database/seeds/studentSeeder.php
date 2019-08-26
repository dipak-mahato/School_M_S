<?php

use Illuminate\Database\Seeder;
use App\Student;
class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student=new Student;
        $student->name="student1";
        $student->address="address1";
        $student->phone="99111111";
        $student->dob="23/2/2018";
        $student->Schoolclass_id=1;
        $student->shift_id=2;
        $student->section_id=2;
        $student->file="img1.jpeg";
         $student->save();


        $student=new Student;
        $student->name="student2";
        $student->address="address2";
        $student->phone="9922222222";
        $student->dob="22/2/2018";
        $student->Schoolclass_id=2;
        $student->shift_id=3;
        $student->section_id=1;
        $student->file="img2.jpeg";
         $student->save();


        $student=new Student;
        $student->name="student3";
        $student->address="address3";
        $student->phone="993333333";
        $student->dob="24/2/2018";
        $student->Schoolclass_id=2;
        $student->shift_id=1;
        $student->section_id=3;
        $student->file="img3.jpeg";
         $student->save();         




        $student=new Student;
        $student->name="student4";
        $student->address="address4";
        $student->phone="99444444";
        $student->dob="23/2/2018";
        $student->Schoolclass_id=1;
        $student->shift_id=2;
        $student->section_id=1;
        $student->file="img4.jpeg";
         $student->save();


        $student=new Student;
        $student->name="student5";
        $student->address="address5";
        $student->phone="996666666";
        $student->dob="22/2/2018";
        $student->Schoolclass_id=2;
        $student->shift_id=3;
        $student->section_id=1;
        $student->file="img5.jpeg";
         $student->save();


        $student=new Student;
        $student->name="student6";
        $student->address="address6";
        $student->phone="9977777";
        $student->dob="24/2/2018";
        $student->Schoolclass_id=2;
        $student->shift_id=1;
        $student->section_id=3;
        $student->file="img6.jpeg";
         $student->save();         


    }
}
