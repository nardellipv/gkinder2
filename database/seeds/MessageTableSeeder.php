<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class, 140)->create()->each(function (Message $message) {
            $message->tutors()->attach([
                rand(1, 50),
            ]);
        });

        factory(Message::class, 50)->create()->each(function (Message $message) {
            $message->schools()->attach([
                rand(1, 20),
            ]);
        });
    }
}
