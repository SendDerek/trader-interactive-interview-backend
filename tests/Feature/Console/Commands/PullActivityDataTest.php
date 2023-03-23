<?php

namespace Tests\Feature\Console\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PullActivityDataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_runs_command_successfully(): void
    {
        $this->artisan('activities:pull')
            ->assertExitCode(0);
    }
}
