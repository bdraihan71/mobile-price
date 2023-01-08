<ul>
    @foreach ($mobile_brands as $item)
        <li>
            <a href="{{ route('brand.name', $item->brand_slug) }}" title="{{ $item->brand_name }}"><i
                    class="fas fa-mobile-alt text-info"></i>{{ $item->brand_name }}</a>
        </li>
    @endforeach
</ul>
