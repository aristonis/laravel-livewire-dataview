<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Traits;

use Aristonis\LaravelLivewireDataview\Traits\ConfigrationTrait;
use Aristonis\LaravelLivewireDataview\Tests\TestCase;

class ConfigrationTraitTest extends TestCase
{
    protected function getDummy()
    {
        return new class {
            use ConfigrationTrait;
        };
    }

    public function test_default_keyname_loaded_from_config()
    {
        config()->set('dataview.item.keyName', 'uuid');

        $obj = $this->getDummy();

        $this->assertEquals('uuid', $obj->getKeyName());
    }

    public function test_set_keyname_overrides_default()
    {
        $obj = $this->getDummy();

        $obj->setKeyName('custom_id');

        $this->assertEquals('custom_id', $obj->getKeyName());
    }
}
