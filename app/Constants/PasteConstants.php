<?php

namespace App\Constants;

interface PasteConstants
{
    public const AVAILABLE_EXPIRATION_TIMES = [
        TimeConstants::TEN_MINUTE_IN_SECONDS,
        TimeConstants::ONE_HOUR_IN_SECONDS,
        TimeConstants::TREE_HOURS_IN_SECONDS,
        TimeConstants::ONE_DAY_IN_SECONDS,
        TimeConstants::ONE_WEEK_IN_SECONDS,
        TimeConstants::ONE_MONTH_IN_SECONDS,
    ];

    public const VISIBILITY_TYPES = [
        0,
        1,
    ];

    public const VISIBILITY_PUBLIC = 0;
    public const VISIBILITY_PRIVATE = 1;

    /** Максимальная длина для longtext sql */
    public const MAX_LENGTH_BODY = 4294967295;
}
