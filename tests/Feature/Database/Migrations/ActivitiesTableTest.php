<?php

namespace Tests\Feature\Database\Migrations;

use App\Constants\ActivityConstants;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ActivitiesTableTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns(
                ActivityConstants::ACTIVITIES_TABLE_NAME,
                ActivityConstants::LIST
            )
        );
    }
}
