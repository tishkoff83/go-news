@foreach($rnews as $i => $one)

<div class="item item-t @if (($i == 2)) item-lg  @else item-sm @endif add-shows" data-id="20359">
    <div class="teaser">
        <a href="@if (!is_null($one->url)) {{  route('link', $one->id) }} @else {{ route('full', $one->slug) }} @endif" target="_blank"></a>
        <div class="item-overlay"></div>
        <div class="item-overlay-blur">
            <img src="{{ asset($one->image) }}">
        </div>
        <div class="item-image">
            <img src="{{ asset($one->image) }}">
        </div>
        <div class="item-title">{{$one->title}}</div>
        {{--                                <div class="item-category">Диеты</div>--}}
        {{--                                <div class="item-date">32 минут назад</div>--}}
        {{--                                <div class="item-button">Подробнее</div>--}}
    </div>
</div>
@endforeach
