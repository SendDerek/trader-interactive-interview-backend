<?php

namespace Tests\Feature\Http\Controllers;

use App\Constants\ActivityConstants;
use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_list(): void
    {
        $count = 3;
        Activity::factory()->count($count)->create();

        $response = $this->get(route('activities.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    0 => ActivityConstants::LIST,
                ],
            ])
            ->assertJsonCount($count, 'data');
    }

    /**
     * @test
     */
    public function it_can_groupByType(): void
    {
        Activity::factory()->count(3)->create([
            'type' => 'recreational',
        ]);

        $response = $this->get(route('activities.groupByType'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    0 => [
                        'type',
                        'max_price',
                        'avg_price',
                        'total_participants',
                    ],
                ],
            ])
            ->assertJsonCount(1, 'data');
    }

    /**
     * @test
     */
    public function it_can_show(): void
    {
        $activities = Activity::factory()->count(3)->create();

        $response = $this->get(route('activities.show', $activities->first()->getKey()));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ActivityConstants::LIST,
            ]);
    }
}
