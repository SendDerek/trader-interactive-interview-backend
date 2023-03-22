<?php

namespace App\Services;

use App\Constants\ActivityConstants;
use App\Contracts\BoredApiRepository as BoredApiRepositoryContract;
use App\Contracts\LoadActivityDataService as LoadActivityDataServiceContract;
use App\Events\ActivityDataReceived;
use App\Models\Activity;

class LoadActivityDataService implements LoadActivityDataServiceContract
{
    public function __construct(
        public BoredApiRepositoryContract $repository
    ) {
    }

    public function queryData(): array
    {
        $data = $this->repository->getActivity();

        ActivityDataReceived::dispatch($data);

        return $data;
    }

    public function handleData(array $data): void
    {
        Activity::create([
            ActivityConstants::ACTIVITY => $data['activity'] ?? null,
            ActivityConstants::TYPE => $data['type'] ?? null,
            ActivityConstants::PARTICIPANTS => $data['participants'],
            ActivityConstants::PRICE => $data['price'],
            ActivityConstants::LINK => $data['link'] ?? null,
            ActivityConstants::KEY => $data['key'] ?? null,
            ActivityConstants::ACCESSIBILITY => $data['accessibility'],
        ]);
    }
}
