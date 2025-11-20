<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Exceptions;

use Aristonis\LaravelLivewireDataview\Exceptions\DataViewException;
use Aristonis\LaravelLivewireDataview\Exceptions\ErrorCodes;
use PHPUnit\Framework\TestCase;

class DataViewExceptionTest extends TestCase
{
    public function test_exception_stores_code_key_and_message()
    {
        $e = new DataViewException(
            ErrorCodes::INVALID_QUERY,
            'invalid-query',
            'Custom message'
        );

        $this->assertEquals(1001, $e->getCode());
        $this->assertEquals('invalid-query', $e->getKey());
        $this->assertEquals('Custom message', $e->getMessage());
    }

    public function test_string_format_is_correct()
    {
        $e = new DataViewException(
            ErrorCodes::MISSING_ITEM_VIEW,
            'missing-item-view'
        );

        $this->assertStringContainsString('DataViewException(1002)(missing-item-view)', (string) $e);
    }
}
