<?php

namespace App\Constants;

class ActivityConstants
{
    public const ACTIVITIES_TABLE_NAME = 'activities';

    public const ID = 'id';

    public const ACTIVITY = 'activity';

    public const TYPE = 'type';

    public const PARTICIPANTS = 'participants';

    public const PRICE = 'price';

    public const LINK = 'link';

    public const KEY = 'key';

    public const ACCESSIBILITY = 'accessibility';

    public const CREATED_AT = 'created_at';

    public const UPDATED_AT = 'updated_at';

    public const LIST = [
        self::ID,
        self::ACTIVITY,
        self::TYPE,
        self::PARTICIPANTS,
        self::PRICE,
        self::LINK,
        self::KEY,
        self::ACCESSIBILITY,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];
}
