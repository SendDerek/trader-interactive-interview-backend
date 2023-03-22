<?php

namespace Tests\Feature\Jobs;

use App\Jobs\LoadActivityData;
use App\Models\Activity;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class LoadActivityDataTest extends TestCase
{
    /**
     * @test
     */
    public function it_is_dispatched(): void
    {
        Bus::fake();

        Activity::factory()->create();

        $this->artisan('activities:pull');

        Bus::assertDispatched(LoadActivityData::class);
    }
}
