<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Exceptions;

use Aristonis\LaravelLivewireDataview\Exceptions\MissingItemViewException;
use Aristonis\LaravelLivewireDataview\Exceptions\ErrorCodes;
use PHPUnit\Framework\TestCase;

class MissingItemViewExceptionTest extends TestCase
{
    
    public function test_exception_defaults_are_correct()
    {
        $e = new MissingItemViewException();

        $this->assertSame(ErrorCodes::MISSING_ITEM_VIEW, $e->getCode());

        $this->assertSame(
            ErrorCodes::MESSAGES[ErrorCodes::MISSING_ITEM_VIEW],
            $e->getMessage()
        );

        // default: empty context
        $this->assertSame([], $e->context());
    }
}
