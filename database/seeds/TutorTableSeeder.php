<?php

use gkinder\Tutor;
use Illuminate\Database\Seeder;

class TutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Tutor::class, 100)->create();
        /* factory(Tutor::class, 100)->create()->each(function (Tutor $tutor) {
            $tutor->Students()->attach([
                rand(1, 50),
                rand(51, 100),
                rand(101, 200),
            ]);
        }); */
    }
}
