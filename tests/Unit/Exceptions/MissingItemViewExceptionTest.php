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

        $this->assertEquals(ErrorCodes::MISSING_ITEM_VIEW, $e->getCode());
        $this->assertEquals('missing-item-view', $e->getKey());
        $this->assertEquals(ErrorCodes::MESSAGES[1002], $e->getMessage());
    }
}
