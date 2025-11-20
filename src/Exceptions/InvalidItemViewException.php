<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

use Exception;

class InvalidItemViewException extends Exception
{
    protected array $context = [];

    public function __construct(string $view, array $extraContext = [])
    {
        $this->context = array_merge(['view' => $view], $extraContext);

        parent::__construct(
            "The item view [{$view}] is invalid.",
            ErrorCodes::INVALID_QUERY
        );
    }

    public function context(): array
    {
        return $this->context;
    }
}
