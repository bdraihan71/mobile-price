<p>
    @foreach ($mobile_prices as $item)
        <a href="{{ route('price.range', $item['slug']) }}">{{ $item['price'] }} </a>
        @if (!$loop->last)
            |
        @endif
    @endforeach
</p>
