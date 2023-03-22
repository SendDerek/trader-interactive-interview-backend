<?php

namespace Tests\Traits;

trait SampleActivityData
{
    private function getSampleData(): string
    {
        return <<< EOL
{
    "activity": "Go for a walk",
    "type": "relaxation",
    "participants": 1,
    "price": 0,
    "link": "",
    "key": "4286250",
    "accessibility": 0.1
}
EOL;
    }
}
