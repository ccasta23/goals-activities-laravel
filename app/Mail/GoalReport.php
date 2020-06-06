<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Goal;

class GoalReport extends Mailable
{
    use Queueable, SerializesModels;

    private $goal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Goal $goal)
    {
        $this->goal = $goal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.GoalReport', [
            'goal' => $this->goal
        ]);
    }
}
