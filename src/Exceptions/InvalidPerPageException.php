<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

use Exception;

class InvalidPerPageException extends Exception
{
    protected array $context = [];

    public function __construct($value = null, array $context = [])
    {
        $this->context = array_merge(['value' => $value], $context);

        parent::__construct(
            ErrorCodes::MESSAGES[ErrorCodes::INVALID_PER_PAGE] ?? 'Invalid per-page value.',
            ErrorCodes::INVALID_PER_PAGE
        );
    }

    public function context(): array
    {
        return $this->context;
    }
}
