<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Course;

class DebugSprint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sprint:debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug mode for testing reports';

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
                    $course->reports_available = 1;
                else //$course->active == 0
                    $course->reports_available = 0;

                $course->save();
            }
        });
    }
}
