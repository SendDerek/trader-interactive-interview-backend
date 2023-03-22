<?php

namespace Tests\Feature\Listeners;

use App\Events\ActivityDataReceived;
use App\Listeners\HandleActivityData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Tests\Traits\SampleActivityData;

class HandleActivityDataTest extends TestCase
{
    use RefreshDatabase;
    use SampleActivityData;

    /**
     * @test
     */
    public function it_is_attached_to_event(): void
    {
        Event::fake();
        Event::assertListening(
            ActivityDataReceived::class,
            HandleActivityData::class,
        );
    }
}
