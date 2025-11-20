<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Unit\Traits;

use Aristonis\LaravelLivewireDataview\Traits\HasItemView;
use Aristonis\LaravelLivewireDataview\Exceptions\MissingItemViewException;
use Aristonis\LaravelLivewireDataview\Exceptions\InvalidItemViewException;
use Aristonis\LaravelLivewireDataview\Tests\TestCase;

class HasItemViewTest extends TestCase
{
    use HasItemView;

    
    public function test_set_item_view_stores_value()
    {
        $this->setItemView('users.row');

        $this->assertSame('users.row', $this->getItemView());
    }

   
    public function test_set_item_view_null_throws_exception()
    {
        $this->expectException(InvalidItemViewException::class);
        $this->expectExceptionMessage('The item view [] is invalid.');

        $this->setItemView('');
    }

    
    public function test_get_item_view_without_setting_throws_exception()
    {
        $this->expectException(MissingItemViewException::class);

        $this->getItemView();
    }
}
