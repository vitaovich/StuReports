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
    protected $description = 'Update sprint count, sprint end date, and whether reports should be available';

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

                if($course->active == 0) //course is inactive
                    $course->reports_available = 0;
                elseif($sprint_end == NULL) //just created/set active
                {
                    $course->last_sprint_end = new Carbon('yesterday');
                    $course->next_sprint_end = new Carbon('next Friday');
                    $course->reports_available = 0;
                }
                elseif($sprint_end == Carbon::today()) //end of sprint
                {
                    $course->reports_available = 1;
                    $course->last_sprint_end = $sprint_end;
                    $course->sprint++;
                    //if this sprint didn't end on Friday, move next sprint end to the Friday of the same week
                    if((new Carbon($sprint_end))->dayOfWeek != Carbon::FRIDAY)
                    {
                         $start = (new Carbon($sprint_end))->addDays($course->sprint_length); //starting point for calculation
                         $monday = $start->startOfWeek(); //the Monday of the same week as $start
                         $course->next_sprint_end = $monday->next(Carbon::FRIDAY); //the Friday of the same week
                    }
                    else //otherwise move next sprint end to the point specified in the table
                        $course->next_sprint_end = (new Carbon($sprint_end))->addDays($course->sprint_length);
                }
                elseif($course->last_sprint_end == Carbon::today()) //running again on a sprint day (shouldn't happen if people mind their business)
                    $course->reports_available = 1; //make sure this is set correctly
                else //not the right day
                    $course->reports_available = 0;

                $course->save();
            }
        });
    }
}
