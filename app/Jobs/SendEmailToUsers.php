<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Services\Message\MessageService;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Http\Services\Message\Email\EmailService;

class SendEmailToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    /**
     * Create a new job instance.
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::whereNotNull("email")->get();

        foreach ($users as $user)
        {
            $emailService = new EmailService();
            $details = [
                'title' => $this->email->title,
                'body' => $this->email->body,
            ];
    
            $emailService->setDetails($details);
            $emailService->setFrom("tahryfrsadq@gmail.com", 'Amazone');
            $emailService->setSubjects($this->email->title);
            $emailService->setTo($user->email);
    
            $messageService = new MessageService($emailService);
            $messageService->send();
        }
    }
}
