@extends('layouts.master')

@section('title', $show->title )

@section('content')
    <script>
        onClick = function () {
            $("a").not(".direct").attr("target", "_blank");
            $(".article-preview a,button").not(".direct").unbind('click').bind('click', function (event) {
                event.preventDefault();
                var bg = " @if (empty($previous->slug)) {{ route('index') }} @else {{ route('show', $previous->slug) }} @endif";
                var url = $(this).attr('href');
                window.open(url, '_blank');
                if (typeof bg != "undefined" && bg != "")
                    window.location = bg;
                return false;
            });
            return true;
        };
        $(function () {
            onClick();
        });
    </script>
<main class="main">
    <div class="container container-list w-100">
        <div class="items-box" id="load">
            <div class="item item-t item-p">
                <div class="article-preview">
                    <a href=" @if (!is_null($show->url)) {{  route('link', $show->id) }} @else {{ route('full', $show->slug) }} @endif" target="_blank"></a>
                    <div class="item-overlay"></div>
                    <div class="item-overlay-blur">
                        <img src=" {{ asset($show->image) }} ">
                    </div>
                    <div class="item-image">
                        <img src="{{ asset($show->image) }}">
                    </div>
                    <div class="item-title">{{ $show->title }}</div>

                    <div class="item-info">
                        <div class="item-date">
                            {{$show->created_at->format('j')}}
                            {{config('months.'.$months)}}
                            в {{$show->created_at->format('G')}}:{{$show->created_at->format('i')}}
                        </div>
{{--                        <div class="item-source">Источник: <i>lenta.ru</i></div>--}}
                    </div>
{{--                    <div class="item-category">Экономика</div>--}}
                    <div class="item-button">Читать полностью</div>
                </div>
            </div>
            <div id="xom-irawucakoxaxabukeyefe">
                <script>
                    !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                        {id:'xom-irawucakoxaxabukeyefe',block:'98257', site_id:'19725'}
                    );})(window, 'mtzBlocks');
                </script>
            </div>
{{--            @include('layouts.news', compact('tnews'))--}}
        </div>
{{--        <div class="loader"><img src="./assets/img/loading.gif"></div>--}}
    </div>
</main>



@endsection
