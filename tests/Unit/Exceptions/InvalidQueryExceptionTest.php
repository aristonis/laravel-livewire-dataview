<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Exceptions;

use Aristonis\LaravelLivewireDataview\Exceptions\InvalidQueryException;
use Aristonis\LaravelLivewireDataview\Exceptions\ErrorCodes;
use PHPUnit\Framework\TestCase;

class InvalidQueryExceptionTest extends TestCase
{
    public function test_exception_defaults_are_correct()
    {
        $e = new InvalidQueryException();

        $this->assertEquals(ErrorCodes::INVALID_QUERY, $e->getCode());
        $this->assertEquals('invalid-query', $e->getKey());
        $this->assertEquals(ErrorCodes::MESSAGES[1001], $e->getMessage());
    }
}
