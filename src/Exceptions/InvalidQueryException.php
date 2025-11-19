<?php

namespace Aristonis\LaravelLivewireDataview\Exceptions;

use RuntimeException;

class InvalidQueryException extends RuntimeException
{
    public static function becauseQueryIsNotBuilder($component)
    {
        $class = is_object($component) ? get_class($component) : (string) $component;
        return new self("The query() method of [$class] must return an instance of Illuminate\\Database\\Eloquent\\Builder or Illuminate\\Database\\Query\\Builder.");
    }
}
