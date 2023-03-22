<?php

namespace App\Contracts;

interface BoredApiRepository
{
    public function getActivity(): array;
}
