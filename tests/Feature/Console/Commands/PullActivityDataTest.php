<?php

namespace Tests\Feature\Console\Commands;

use Tests\TestCase;

class PullActivityDataTest extends TestCase
{
    /**
     * @test
     */
    public function it_runs_command_successfully(): void
    {
        $this->artisan('activities:pull')
            ->assertExitCode(0);
    }
}
