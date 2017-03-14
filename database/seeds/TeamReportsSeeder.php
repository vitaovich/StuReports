<?php

use Illuminate\Database\Seeder;

class TeamReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\TeamReport::class, 10)->create();
    }
}
