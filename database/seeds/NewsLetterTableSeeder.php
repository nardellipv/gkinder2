<?php

use gkinder\NewsLetter;
use Illuminate\Database\Seeder;

class NewsLetterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NewsLetter::class, 100)->create();
    }
}
