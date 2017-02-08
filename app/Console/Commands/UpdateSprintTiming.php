<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Course;
use Carbon\Carbon;

class UpdateSprintTiming extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sprint:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update sprint start and end in classes';

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
              $sprint_end = $course->next_sprint_end;

              if($course->active == 0)
                  $course->reports_available = 0;
              elseif($sprint_end == Carbon::today())
              {
                  $course->reports_available = 1;
                  $course->last_sprint_end = $sprint_end;
                  $course->sprint++;
                  //if this sprint didn't end on Friday, move next sprint end to the nearest Friday
                  if((new Carbon($sprint_end))->dayOfWeek != 6)
                      $course->next_sprint_end = (new Carbon($sprint_end))->addDays(21 - $course->sprint_length); //the Friday afterward
                  else
                      $course->next_sprint_end = (new Carbon($sprint_end))->addDays($course->sprint_length);
              }
              elseif($sprint_end == NULL) //just created
              {
                  $course->next_sprint_end = new Carbon('next Friday');
              }
              else //not the right day
                  $course->reports_available = 0;

              $course->save();
            }
        });
    }
}
