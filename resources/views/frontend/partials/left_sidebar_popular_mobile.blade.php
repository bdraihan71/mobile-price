<ul>
    @foreach ($mobile_models as $item)
        <li>
            <a href="{{ route('model.name', $item->model_slug) }}" title="{{ $item->model_name }}"><i
                    class="fas fa-mobile-alt text-info"></i>{{ $item->model_name }}</a>
        </li>
    @endforeach
</ul>
