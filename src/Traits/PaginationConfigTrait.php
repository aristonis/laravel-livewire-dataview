<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

use Aristonis\LaravelLivewireDataview\Exceptions\InvalidPerPageException;

trait PaginationConfigTrait
{
    // Keep existing property names from your code to avoid breaking tests
    protected bool $hasPagination = true;
    protected int $perPage = 0;

    public function isPaginagtionEnable(): bool
    {
        return $this->hasPagination;
    }

    public function enablePagination(): void
    {
        $this->hasPagination = true;
    }

    public function disablePagination(): void
    {
        $this->hasPagination = false;
    }

    public function getPerPage(): int
    {
        if ($this->perPage === 0) {
            $configured = config("dataview.pagination.per_page", 10);
            // Ensure we set internal perPage to configured integer
            $this->setPerPage((int) $configured);
            return (int) $configured;
        }

        return $this->perPage;
    }

    public function setPerPage(int $perPage): void
    {
        // Validate integer and positive value
        if (! is_int($perPage) || $perPage < 1) {
            throw new InvalidPerPageException($perPage, ['method' => 'setPerPage', 'trait' => self::class]);
        }

        $this->perPage = $perPage;
    }
}
