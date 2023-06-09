<?php

namespace App\Jobs;

use Exception;
use App\Mail\EmailForQueuing;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $file_name;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details, $file_name)
    {
        $this->details = $details;
        $this->file_name = $file_name;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $email = new EmailForQueuing($this->file_name);
            Mail::to($this->details['email'])->send($email);
        }catch(Exception $e){
            Log::error($e->getMessage());
        }


    }


}
