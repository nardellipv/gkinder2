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
    }
}
