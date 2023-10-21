<?php

namespace App\Console\Commands;

use App\Models\Email;
use App\Jobs\SendEmailToUsers;
use Illuminate\Console\Command;

class AutoEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:SendEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $EmailsToSend = Email::where('published_at' , "=" , now())->where('status' , "=" , 1)->get();

        foreach($EmailsToSend as $EmailToSend)
        {
            SendEmailToUsers::dispatch($EmailToSend);
        }
    }
}
