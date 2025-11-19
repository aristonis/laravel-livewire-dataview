<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

use Exception;

/**
 * pagination configration for query 
 * 
 */
trait PaginationConfigTrait
{

    protected  bool $hasPagination = true;
    protected int  $perPage = 0;
    public function isPaginagtionEnable(): bool
    {
        return $this->hasPagination;
    }

    public function enablePagination()
    {
        $this->hasPagination = true;
    }
    public function disablePagination()
    {
        $this->hasPagination = false;
    }
    public function getPerPage(): int
    {
        if ($this->perPage == 0) {
            $perPage = config("dataview.pagination.per_page", 10);
            $this->setPerPage($perPage);
            return $perPage;
        }
        return $this->perPage;
    }
    public function setPerPage(int $perPage): void
    {
        if ($perPage < 1) {
            throw new Exception("perPage can't be less then 1", 1);
        } else {
            $this->perPage = $perPage;
        }
    }
}
