<?php

namespace App\Console\Commands;

use App\Jobs\LoadActivityData;
use Illuminate\Console\Command;

class PullActivityData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activities:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data from external activities API';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        LoadActivityData::dispatch();
    }
}
