<?php

use gkinder\Student;
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
        // factory(Student::class, 200)->create();
        factory(Student::class, 200)->create()->each(function (Student $student) {
            $student->tutors()->attach([
                rand(1, 50),
            ]);
        });
    }
}
