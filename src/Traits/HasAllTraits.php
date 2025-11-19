<?php

namespace Aristonis\LaravelLivewireDataview\Traits;

trait HasAllTraits
{
    use PaginationConfigTrait;
    use HasQuery;
    use ConfigrationTrait;
    use HasItemView;
    public function bootHasAllTraits(): void
    {


        if (method_exists($this, 'configure')) {
            $this->configure();
        }
    }
}
