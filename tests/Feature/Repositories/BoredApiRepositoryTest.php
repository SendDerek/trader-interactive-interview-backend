<?php

namespace Tests\Feature\Repositories;

use App\Contracts\BoredApiRepository as BoredApiRepositoryContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Tests\Traits\SampleActivityData;

class BoredApiRepositoryTest extends TestCase
{
    use SampleActivityData;

    public BoredApiRepositoryContract $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = App::make(BoredApiRepositoryContract::class);
    }

    /**
     * @test
     */
    public function the_repository_can_be_instantiated(): void
    {
        $this->assertInstanceOf(BoredApiRepositoryContract::class, $this->repository);
    }

    /**
     * @test
     */
    public function it_can_get_activity(): void
    {
        Http::fake([
            'https://www.boredapi.com/*' => Http::response($this->getSampleData()),
        ]);

        $activity = $this->repository->getActivity();

        $this->assertIsArray($activity);
        $this->assertArrayHasKey('activity', $activity);
        $this->assertArrayHasKey('type', $activity);
        $this->assertArrayHasKey('participants', $activity);
        $this->assertArrayHasKey('price', $activity);
        $this->assertArrayHasKey('link', $activity);
        $this->assertArrayHasKey('key', $activity);
        $this->assertArrayHasKey('accessibility', $activity);
    }
}
