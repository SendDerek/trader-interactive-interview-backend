<?php

namespace Tests\Feature\Events;

use App\Contracts\LoadActivityDataService as LoadActivityDataServiceContract;
use App\Events\ActivityDataReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Tests\Traits\SampleActivityData;

class ActivityDataReceivedTest extends TestCase
{
    use RefreshDatabase;
    use SampleActivityData;

    /**
     * @test
     */
    public function it_gets_dispached_when_receiving_activity_data(): void
    {
        Event::fake();
        Http::fake([
            'https://www.boredapi.com/*' => Http::response($this->getSampleData()),
        ]);

        /** @var LoadActivityDataServiceContract $service */
        $service = App::make(LoadActivityDataServiceContract::class);
        $service->queryData();

        Event::assertDispatched(ActivityDataReceived::class);
    }
}
