<?php

namespace App\Services;

use App\Contracts\ActivityService as ActivityServiceContract;
use App\Models\Activity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ActivityService implements ActivityServiceContract
{
    public function get(?string $groupBy = null): Collection
    {
        return Activity::get();
    }

    /**
     * @throws ModelNotFoundException
     */
    public function find(int $id): Activity
    {
        return Activity::findOrFail($id);
    }

    /**
     * Code smell:  Gotta be a better way.  Maybe in the Resource/Transformer?
     */
    public function groupByType(): Collection
    {
        return Activity::select(DB::raw('type, MAX(price) as max_price, AVG(price) as avg_price, COUNT(participants) as total_participants'))
            ->groupBy('type')
            ->get();
    }
}
