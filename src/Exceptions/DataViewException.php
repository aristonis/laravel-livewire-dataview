<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

use Exception;

class DataViewException extends Exception
{
    protected string $key;

    public function __construct(int $code, string $key, ?string $message = null)
    {
        $this->key = $key;

        parent::__construct(
            $message ?? (ErrorCodes::MESSAGES[$code] ?? 'Unknown DataView error'),
            $code
        );
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function format(): string
    {
        return sprintf(
            "DataViewException(%s)(%s): %s",
            $this->code,
            $this->key,
            $this->message
        );
    }

    public function __toString(): string
    {
        return $this->format();
    }
}
