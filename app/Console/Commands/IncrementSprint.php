<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Course;

class IncrementSprint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sprint:increment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increments the sprint number of all active courses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      Course::chunk(200, function($courses)
      {
        foreach($courses as $course)
        {
          if($course->active == 1)
          {
            $course->sprint += 1;
            $course->save();
          }
        }
      });
    }
}
