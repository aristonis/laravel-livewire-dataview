<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

class ErrorCodes
{
    public const INVALID_QUERY = 1001;
    public const MISSING_ITEM_VIEW = 1002;

    public const MESSAGES = [
        self::INVALID_QUERY     => 'Query() must return an Eloquent\Builder instance.',
        self::MISSING_ITEM_VIEW => 'Item view must be defined before rendering.',
    ];
}
