<?php

namespace Aristonis\LaravelLivewireDataview;

use Livewire\Component;
use Aristonis\LaravelLivewireDataview\Traits\HasAllTraits;

abstract class DataViewComponent extends Component
{
    use HasAllTraits;

    /**
     * Items bound to the view (collection or paginator).
     *
     * @var mixed
     */
    protected $items;


    abstract protected function configure();

    /**
     * Child components MUST implement this and return a Query Builder
     * or Eloquent Builder instance.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    abstract protected function query();


    /**
     * Rebuild items and return view data.
     *
     * Keep this simple: call buildQuery every render to ensure consistent data.
     */
    public function render()
    {
        $this->items = $this->buildQuery();

        // default view (package provides a minimal view), developer components usually override view()
        return view('aristonis-dataview::livewire.dataview', [
            'items' => $this->items,
        ]);
    }
}
