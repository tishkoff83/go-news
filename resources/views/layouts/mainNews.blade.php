@foreach($news as $i => $one)
    <div class="item item-t @if (($i == 4) || ($i == 5) || ($i == 10) || ($i == 11) || ($i == 16) || ($i == 17)) item-lg  @else item-sm @endif">
        <div class="teaser">
            <a href=" {{ route('show', $one->slug) }} "></a>
            <div class="item-overlay"></div>
            <div class="item-overlay-blur">
                <img src=" {{ asset($one->image) }} ">
            </div>
            <div class="item-image">
                <img src=" {{ asset($one->image) }} ">
            </div>
            <div class="item-title">{{ $one->title }}</div>
            {{--    <div class="item-category">Экономика</div>--}}
            {{--    <div class="item-date">48 минут назад</div>--}}
            {{--    <div class="item-button">Подробнее</div>--}}
        </div>
    </div>
@endforeach
