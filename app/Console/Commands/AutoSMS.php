<?php

namespace App\Console\Commands;

use App\Jobs\SendSMSToUsers;
use App\Models\SMS;
use Illuminate\Console\Command;

class AutoSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:SendSMS';

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
        $SMSToSend = SMS::where('published_at' , "=" , now())->where('status' , "=" , 1)->get();

        foreach($SMSToSend as $SMSItemToSend)
        {
            SendSMSToUsers::dispatch($SMSItemToSend);
        }
    }
}
