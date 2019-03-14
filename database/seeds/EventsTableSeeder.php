<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds for events table.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 10)->create();
    }
}
