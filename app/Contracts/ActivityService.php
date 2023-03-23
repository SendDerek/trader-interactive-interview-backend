<?php

namespace App\Contracts;

use App\Models\Activity;
use Illuminate\Support\Collection;

interface ActivityService
{
    public function get(): Collection;

    public function find(int $id): Activity;

    public function groupByType(): Collection;
}
