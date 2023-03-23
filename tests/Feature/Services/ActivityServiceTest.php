<?php

namespace Tests\Feature\Services;

use App\Contracts\ActivityService as ActivityServiceContract;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ActivityServiceTest extends TestCase
{
    use RefreshDatabase;

    public ActivityServiceContract $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = App::make(ActivityServiceContract::class);
    }

    /**
     * @test
     */
    public function the_service_can_be_instantiated(): void
    {
        $this->assertInstanceOf(ActivityServiceContract::class, $this->service);
    }

    /**
     * @test
     */
    public function it_can_get(): void
    {
        $count = 3;

        Activity::factory()->count($count)->create();

        $modelsFromService = $this->service->get();

        $this->assertCount($count, $modelsFromService);
    }

    /**
     * @test
     */
    public function it_can_find(): void
    {
        $activity = Activity::factory()->create();

        $modelFromService = $this->service->find($activity->getKey());

        $this->assertNotNull($modelFromService);
    }

    /**
     * @test
     */
    public function it_can_get_grouped_by_type(): void
    {
        Activity::factory()->count(3)->create([
            'type' => 'recreational',
            'price' => 100.00,
            'participants' => 1,
        ]);

        $modelsFromService = $this->service->groupByType();

        $this->assertCount(1, $modelsFromService);
        $this->assertNotNull($modelsFromService->first()->type);
        $this->assertEquals('recreational', $modelsFromService->first()->type);
        $this->assertNotNull($modelsFromService->first()->max_price);
        $this->assertEquals(100.00, $modelsFromService->first()->max_price);
        $this->assertNotNull($modelsFromService->first()->avg_price);
        $this->assertEquals(100.00, $modelsFromService->first()->avg_price);
        $this->assertNotNull($modelsFromService->first()->total_participants);
        $this->assertEquals(3, $modelsFromService->first()->total_participants);
    }
}
