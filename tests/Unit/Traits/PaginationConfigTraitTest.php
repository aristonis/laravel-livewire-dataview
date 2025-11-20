<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Traits;

use Aristonis\LaravelLivewireDataview\Traits\PaginationConfigTrait;
use Aristonis\LaravelLivewireDataview\Tests\TestCase;
use Exception;

class PaginationConfigTraitTest extends TestCase
{
    protected function getDummy()
    {
        return new class {
            use PaginationConfigTrait;
        };
    }

    public function test_default_pagination_enabled()
    {
        $obj = $this->getDummy();

        $this->assertTrue($obj->isPaginagtionEnable());
    }

    public function test_disable_pagination()
    {
        $obj = $this->getDummy();
        $obj->disablePagination();

        $this->assertFalse($obj->isPaginagtionEnable());
    }

    public function test_get_per_page_from_config()
    {
        config()->set('dataview.pagination.per_page', 25);

        $obj = $this->getDummy();

        $this->assertEquals(25, $obj->getPerPage());
    }

    public function test_set_per_page_throws_on_invalid()
    {
        $obj = $this->getDummy();

        $this->expectException(Exception::class);

        $obj->setPerPage(0);
    }
}
