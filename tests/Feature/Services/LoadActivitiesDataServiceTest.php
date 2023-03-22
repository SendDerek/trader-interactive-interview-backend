<?php

namespace Tests\Feature\Services;

use App\Constants\ActivityConstants;
use App\Contracts\LoadActivityDataService as LoadActivityDataServiceContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Tests\Traits\SampleActivityData;

class LoadActivitiesDataServiceTest extends TestCase
{
    use RefreshDatabase;
    use SampleActivityData;

    public LoadActivityDataServiceContract $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = App::make(LoadActivityDataServiceContract::class);
    }

    /**
     * @test
     */
    public function the_service_can_be_instantiated(): void
    {
        $this->assertInstanceOf(LoadActivityDataServiceContract::class, $this->service);
    }

    /**
     * @test
     */
    public function it_can_query_data(): void
    {
        Http::fake([
            'https://www.boredapi.com/*' => Http::response($this->getSampleData()),
        ]);

        $data = $this->service->queryData();

        $this->assertIsArray($data);
    }

    /**
     * @test
     */
    public function it_can_handle_data(): void
    {
        Http::fake([
            'https://www.boredapi.com/*' => Http::response($this->getSampleData()),
        ]);

        $data = $this->service->queryData();

        $this->service->handleData($data);

        $this->assertDatabaseHas(ActivityConstants::ACTIVITIES_TABLE_NAME, [
            'activity' => 'Go for a walk',
            'type' => 'relaxation',
        ]);
    }
}
