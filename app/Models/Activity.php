<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $activity
 * @property string $type
 * @property int $participants
 * @property float $price
 * @property string $link
 * @property string $key
 * @property float $accessibility
 */
class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity',
        'type',
        'participants',
        'price',
        'link',
        'key',
        'accessibility',
    ];
}
