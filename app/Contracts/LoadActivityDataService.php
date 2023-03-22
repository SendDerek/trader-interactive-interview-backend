<?php

namespace App\Contracts;

interface LoadActivityDataService
{
    public function queryData(): array;

    public function handleData(array $data): void;
}
