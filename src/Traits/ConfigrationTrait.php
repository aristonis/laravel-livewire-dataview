<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

trait ConfigrationTrait
{
    public string $keyName;

    public function getKeyName(): string
    {
        if (!isset($this->keyName)) {
            $this->setKeyName(config('dataview.item.keyName', "id"));
        }
        return $this->keyName;
    }
    public function setKeyName(string $value)
    {
        $this->keyName = $value;
    }
}
