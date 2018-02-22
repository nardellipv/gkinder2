<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchoolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TutorTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(CalendarTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(NewsLetterTableSeeder::class);
    }
}
