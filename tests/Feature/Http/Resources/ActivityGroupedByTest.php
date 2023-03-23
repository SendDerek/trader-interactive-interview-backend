<?php

namespace Tests\Feature\Http\Resources;

use App\Http\Resources\ActivityGroupedByType;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class ActivityGroupedByTest extends TestCase
{
    use RefreshDatabase;

    private const EXPECTED_KEYS = ['type', 'max_price', 'avg_price', 'total_participants'];

    /**
     * @test
     */
    public function it_has_expected_columns(): void
    {
        $activity = Activity::factory()->create();

        $request = Request::create('');

        $resource = new ActivityGroupedByType($activity);
        $resourceArray = $resource->toArray($request);

        foreach (self::EXPECTED_KEYS as $key) {
            $this->assertArrayHasKey($key, $resourceArray);
        }
    }

    /**
     * @test
     */
    public function it_has_collection(): void
    {
        $count = 3;

        $activities = Activity::factory()->count($count)->create();

        $request = Request::create('');

        $resource = ActivityGroupedByType::collection($activities);
        $resourceArray = $resource->toArray($request);

        $this->assertEquals($count, count($resourceArray));

        foreach (self::EXPECTED_KEYS as $key) {
            $this->assertArrayHasKey($key, $resourceArray[0]);
        }
    }
}
