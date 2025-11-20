<?php

namespace Aristonis\LaravelLivewireDataview\Tests\Feature\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Aristonis\LaravelLivewireDataview\Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;

class HasQueryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // create fake table
        $this->app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
        });
    }

    
    public function test_query_returns_eloquent_builder()
    {
        $model = new class extends Model {
            protected $table = 'users';
        };

        $query = $model->newQuery();

        $this->assertInstanceOf(Builder::class, $query);
    }

    
    public function test_basic_query_can_execute()
    {
        $model = new class extends Model {
            protected $table = 'users';
        };

        $result = $model->newQuery()->get();

        $this->assertTrue($result->isEmpty());
    }
}
