<?php

namespace App\Listeners;

use App\Contracts\LoadActivityDataService as LoadActivityDataServiceContract;
use App\Events\ActivityDataReceived;

class HandleActivityData
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private LoadActivityDataServiceContract $activityDataService
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(ActivityDataReceived $event): void
    {
        $this->activityDataService->handleData($event->data);
    }
}
