<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('students')->insert(
            [
                "student_number"=>rand(97000000,97999999),
                "faculty_id"=>rand(1,20),
                "field_id"=>rand(1,200),
                "section_id"=>rand(2,6)
            ]
        );
    }
}
