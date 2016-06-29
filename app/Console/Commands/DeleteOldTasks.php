<?php

namespace App\Console\Commands;

use App\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteOldTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove tasks older than 1 month';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jobs = Job::where('created_at', '<=', Carbon::now()->subMonth())->get();

        if(count($jobs) > 0){
            $jobs->delete();
            Log::info('Tasks older then 1 month removed');
        }else{
            Log::info('There is no task older than 1 month to be removed.');
        }
    }
}
