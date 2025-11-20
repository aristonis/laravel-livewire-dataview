<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

use InvalidArgumentException;

trait HasItemView
{
    protected ?string $itemView = null;

    public function getItemView(): string
    {
        if (! $this->itemView) {
            throw new InvalidArgumentException(
                "Item view is not set. Call setItemView('livewire.component-path') inside configure()."
            );
        }

        return $this->itemView;
    }

    public function setItemView(?string $view): void
    {
        if (trim($view) === '') {
            throw new InvalidArgumentException("Item view cannot be empty.");
        }

        $this->itemView = $view;
    }
}
