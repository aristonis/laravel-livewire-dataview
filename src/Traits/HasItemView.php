<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

use Aristonis\LaravelLivewireDataview\Exceptions\MissingItemViewException;
use Aristonis\LaravelLivewireDataview\Exceptions\InvalidItemViewException;

trait HasItemView
{
    protected ?string $itemView = null;

    public function getItemView(): string
    {
        if (! $this->itemView) {
            throw new MissingItemViewException([
                'method' => 'getItemView',
                'trait'  => self::class,
            ]);
        }

        return $this->itemView;
    }

    public function setItemView(?string $view): void
    {
        if (! $view || trim($view) === '') {
            throw new InvalidItemViewException($view ?? '', [
                'method' => 'setItemView',
                'trait'  => self::class,
            ]);
        }

        $this->itemView = $view;
    }
}
