<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\IndividualReportEmail;
use App\Mail\TeamReportEmail;
use App\User;

class EmailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test email';

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
        Mail::to('seth.riedel@gmail.com')->send(new IndividualReportEmail(User::where('id', '=', '30001')->first()));
        Mail::to('seth.riedel@gmail.com')->send(new TeamReportEmail(User::where('id', '=', '30001')->first()));
    }
}
