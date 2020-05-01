@foreach($tnews as $i => $one)
<div class="item item-t @if (($i == 4) || ($i == 5) || ($i == 10) || ($i == 11) || ($i == 16) || ($i == 17)) item-lg  @else item-sm @endif add-shows">
    <div class="teaser">
        <a href=" @if (!is_null($one->url)) {{  route('link', $one->id) }} @else {{ route('full', $one->slug) }} @endif " target="_blank"></a>
        <div class="item-overlay"></div>
        <div class="item-overlay-blur">
            <img src=" {{ asset($one->image) }}">
        </div>
        <div class="item-image">
            <img src="{{ asset($one->image) }}">
        </div>
        <div class="item-title"><b>{{$one->title}}</b></div>

{{--        <div class="item-category">Зрение</div>--}}
{{--        <div class="item-date">41 минут назад</div>--}}
{{--        <div class="item-button">Подробнее</div>--}}
    </div>
</div>
@endforeach
