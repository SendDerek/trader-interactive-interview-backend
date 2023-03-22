<?php

namespace Tests\Feature\Models;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_proper_fillable_attributes(): void
    {
        $activity = Activity::factory()->create();

        $expectedFillables = [
            'activity',
            'type',
            'participants',
            'price',
            'link',
            'key',
            'accessibility',
        ];

        foreach ($expectedFillables as $expected) {
            $this->assertTrue(in_array($expected, $activity->getFillable()));
        }
    }
}
