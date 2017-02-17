<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\IndividualReportEmail;
use App\Mail\TeamReportEmail;
use App\User;
use Carbon\Carbon;

class EmailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all scheduled emails to students';

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
        User::chunk(200, function($users)
        {
            foreach($users as $user)
            {
                if($user->role == 'Student' && $user->group_id != 1)
                {
                    $course = $user->course();
                    if($course->last_sprint_end == new Carbon('yesterday') && $course->sprint != 0)
                    {
                        Mail::to($user->email)->send(new IndividualReportEmail($user));
                        Mail::to($user->email)->send(new TeamReportEmail($user));
                    }
                }
            }
        });
    }
}
