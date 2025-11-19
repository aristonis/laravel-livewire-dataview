<div class="dv-container">


    <div class="dv-items">
        @foreach ($items as $item)
            {{-- @dd($this->getItemView()) --}}
            @livewire($this->getItemView(), ['item' => $item], key($item->{$this->getKeyName()}))
        @endforeach
    </div>
    @if ($items instanceof \Illuminate\Contracts\Pagination\Paginator)
        <div class="dv-pagination">
            {{ $items->links() }}
        </div>
    @endif

</div>
