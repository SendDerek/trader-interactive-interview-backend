<?php

namespace App\Http\Controllers;

use App\Contracts\ActivityService as ActivityServiceContract;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;
use Inertia\Response;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function __construct(
        private ActivityServiceContract $activityService
    ) {
    }

    public function activitiesReport(): Response
    {
        $activities = $this->activityService->groupByType();

        //        return Inertia::render('Home', [
        //            'activities' => $activities,
        //        ]);

        return Inertia::render('Activities/GroupedByType', [
            'activities' => $activities,
        ]);
    }
}
