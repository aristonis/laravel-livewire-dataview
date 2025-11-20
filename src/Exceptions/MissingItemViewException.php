<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

class MissingItemViewException extends DataViewException
{
    public function __construct(?string $message = null)
    {
        parent::__construct(
            ErrorCodes::MISSING_ITEM_VIEW,
            'missing-item-view',
            $message
        );
    }
}
