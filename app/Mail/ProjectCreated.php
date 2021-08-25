<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $project;
    public $client;
    public $user;

    public function __construct(Project $project, Client $client, User $user)
    {
        $this->project = $project;
        $this->client = $client;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test.test@test.hr', 'Test test')
                    ->view('projectCreatedEmail');
    }
}
