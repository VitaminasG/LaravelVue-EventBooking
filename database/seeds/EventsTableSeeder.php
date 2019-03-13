<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds for Events DB table.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 5)->create();
    }
}
