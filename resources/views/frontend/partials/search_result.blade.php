<ul class="list-group">
    @if (count($mobile_models) >= 1)
        @foreach ($mobile_models as $item)
            <a href="{{ route('model.name', $item->model_slug) }}">
                <li class="list-group-item">
                    <img src={{ url('images/model_images/' . $item->model_image) }} height="40px" width="40px"
                        alt="">
                    <strong>{{ $item->model_name }}</strong>
                </li>
            </a>
        @endforeach
    @else
        <li class="list-group-item">
            <strong>Not Matched</strong>
        </li>
    @endif
</ul>
