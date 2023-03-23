<?php

namespace App\Http\Controllers;

use App\Contracts\ActivityService as ActivityServiceContract;
use App\Http\Resources\Activity as ActivityResource;
use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityGroupedByTypeCollection as ActivityGroupedByTypeCollection;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function __construct(
        private ActivityServiceContract $activityService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ActivityCollection
    {
        $activities = $this->activityService->get();
        return new ActivityCollection($activities);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity): ActivityResource
    {
        return new ActivityResource($activity);
    }

    /**
     * Display a listing of the resource.
     */
    public function groupByType(): ActivityGroupedByTypeCollection
    {
        $activities = $this->activityService->groupByType();
        return new ActivityGroupedByTypeCollection($activities);
    }
}
