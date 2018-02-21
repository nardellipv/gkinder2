<?php

use gkinder\Calendar;
use Illuminate\Database\Seeder;

class CalendarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Calendar::class, 100)->create();
    }
}
