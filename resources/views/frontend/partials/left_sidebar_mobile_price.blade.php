<ul>
    @foreach ($mobile_prices as $item)
        <li>
            <a href="{{ route('price.range', $item['slug']) }}"><i class="far fa-money-bill-alt text-info"></i>{{ $item['price'] }}</a>
        </li>
    @endforeach
</ul>
