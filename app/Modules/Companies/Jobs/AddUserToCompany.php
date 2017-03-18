<?php

namespace BB\Modules\Companies\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddUserToCompany implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $company;
    protected $user;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company,$user)
    {
        $this->company = $company;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->company->employees()->save($this->user);
        $this->user->role()->associate(1)->save();
    }
}
