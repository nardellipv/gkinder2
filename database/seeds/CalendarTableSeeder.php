<?php

use Illuminate\Database\Seeder;
use App\Calendar;

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
