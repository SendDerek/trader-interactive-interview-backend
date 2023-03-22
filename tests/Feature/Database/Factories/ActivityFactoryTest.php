<?php

namespace Tests\Feature\Database\Factories;

use App\Constants\ActivityConstants;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_produces_working_model(): void
    {
        /** @var Activity $model */
        $model = Activity::factory()->create();
        $this->assertModelExists($model);

        foreach(ActivityConstants::LIST as $column) {
            $this->assertNotNull($model->{$column});
        }
    }
}
