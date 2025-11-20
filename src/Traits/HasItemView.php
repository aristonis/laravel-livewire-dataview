<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

use Aristonis\LaravelLivewireDataview\Exceptions\MissingItemViewException;
use InvalidArgumentException;

trait HasItemView
{
    protected ?string $itemView = null;

    public function getItemView(): string
    {
        if (! $this->itemView) {
            throw new MissingItemViewException();
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
