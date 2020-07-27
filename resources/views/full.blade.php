@extends('layouts.master')

@section('title', $full->title )

@section('content')

    <main class="main">
        <div class="container container-article">
            <div class="w-50 left">
                <div class="item item-a item-lg">
                    <div class="article">
                                            <div class="item-info">
                                                <div class="item-date">
                                                    {{$full->created_at->format('j')}}
                                                    {{config('months.'.$months)}}
                                                    в {{$full->created_at->format('G')}}:{{$full->created_at->format('i')}}
                                                </div>
{{--                                                <div class="item-category">Экономика</div>--}}
                                            </div>
                        <h1> {{ $full->title }} </h1>

                        <div>
                            {!! $full->body !!}
                        </div>


                        <div class="item-recommended">
                            <div class="item-title">Читайте также</div>


{{--                            @foreach($mnews as $one)--}}
{{--                                <div class="item item-t item-hr add-shows" data-id="25789">--}}
{{--                                    <div class="teaser">--}}
{{--                                        <a href="@if (!is_null($one->url)) {{  route('link', $one->id) }} @else {{ route('full', $one->slug) }} @endif"--}}
{{--                                           target="_blank"></a>--}}
{{--                                        <div class="item-overlay"></div>--}}
{{--                                        <div class="item-overlay-blur">--}}
{{--                                            <img src="{{ asset($one->image) }}">--}}
{{--                                        </div>--}}
{{--                                        <div class="item-image">--}}
{{--                                            <img src="{{ asset($one->image) }}">--}}
{{--                                        </div>--}}
{{--                                        <div class="item-title">{{$one->title}}</div>--}}
{{--                                        --}}{{-- <div class="item-category">Суставы</div>--}}
{{--                                        --}}{{-- <div class="item-date">8 минут назад</div>--}}
{{--                                        --}}{{--  <div class="item-button">Подробнее</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="w-50 right">
                <div class="items-box sticky">
                    <div class="item-title">Рекомендуем</div>


{{--                    @include('layouts.rigthFullNews', compact('rnews'))--}}

                </div>
            </div>
        </div>
        <div class="container container-list w-100">
            <div class="items-box" id="load">

                <script async src="//lomqbs.com/4ij7l1912liv/0mp30yqh8/786uqv/867/ykp2usky.php"></script>
                <div data-la-block="8451f0cb-add3-40b5-af74-66b27d312fe2"></div>
                <script async src="//lomqbs.com/lgxl71912ivl/pm0y03hq8687vuq768ypkeovt.php"></script>
                <div data-la-block="0de43702-bf53-4e1b-ac2f-51ddcbe72c30"></div>

{{--                @include('layouts.news', compact('tnews'))--}}

            </div>
            {{--            <div class="loader"><img src="./assets/img/loading.gif"></div>--}}
        </div>
    </main>

@endsection
