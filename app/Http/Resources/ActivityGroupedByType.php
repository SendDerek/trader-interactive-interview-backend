<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $type
 * @property float $max_price
 * @property float $avg_price
 * @property int $total_participants
 */
class ActivityGroupedByType extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type,
            'max_price' => $this->max_price,
            'avg_price' => $this->avg_price,
            'total_participants' => $this->total_participants,
        ];
    }
}
