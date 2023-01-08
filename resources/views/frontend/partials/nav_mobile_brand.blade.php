<p>
    @foreach ($mobile_brands as $item)
        <a href="{{ route('brand.name', $item->brand_slug) }}">{{ $item->brand_name }} </a>
        @if (!$loop->last)
            |
        @endif
    @endforeach
</p>
