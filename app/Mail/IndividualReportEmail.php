<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class IndividualReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tasks = [];
        $student_tasks = $this->user->tasks;
        foreach($student_tasks as $task)
        {
            $task_and_Reports = [];
            array_push($task_and_Reports, $task);
            $taskReports = Task::findOrFail($task->id)->taskReports->where('sprint', '<=', $sprint);
            array_push($task_and_Reports, $taskReports);
            array_push($tasks, $task_and_Reports);
        }
        return $this->subject("Individual Report, " . $this->user->name)
                    ->view('emails.individual_report', [
                        'student' => $this->user,
                        'sprint' => $this->user->course()->sprint,
                        'tasks' => $tasks
                    ]);
    }
}
