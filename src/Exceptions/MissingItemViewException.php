<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

use Exception;

class MissingItemViewException extends Exception
{
    protected array $context = [];

    public function __construct(array $context = [])
    {
        $this->context = $context;

        parent::__construct(
            ErrorCodes::MESSAGES[ErrorCodes::MISSING_ITEM_VIEW],
            ErrorCodes::MISSING_ITEM_VIEW
        );
    }

    public function context(): array
    {
        return $this->context;
    }
}
