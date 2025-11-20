<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Traits;

use Aristonis\LaravelLivewireDataview\Traits\HasItemView;
use Aristonis\LaravelLivewireDataview\Tests\TestCase;
use InvalidArgumentException;
use Exception;

class HasItemViewTest extends TestCase
{
    /** Dummy class using trait */
    protected function getDummy()
    {
        return new class {
            use HasItemView;
        };
    }

    public function test_set_item_view_stores_value()
    {
        $obj = $this->getDummy();
        $obj->setItemView("admin.user-row");

        $this->assertEquals("admin.user-row", $obj->getItemView());
    }

    public function test_set_item_view_null_throws_exception()
    {
        $this->expectException(InvalidArgumentException::class);

        $obj = $this->getDummy();
        $obj->setItemView(null);
    }

    public function test_get_item_view_without_setting_throws_exception()
    {
        $this->expectException(Exception::class);

        $obj = $this->getDummy();
        $obj->getItemView();
    }
}
