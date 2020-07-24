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

                        <script async src="//bpioqb.com/smd1l7/921vli/pm0y30q8h687vqu687pyk3g.php"></script>
                        <div data-la-block="46ee8db0-b5eb-436d-8fd9-28e188a4e5c9"></div>

                        <div>
                            {!! $full->body !!}
                        </div>


                        <div class="item-recommended">
                            <div class="item-title">Читайте также</div>

                            <script async src="//bpioqb.com/7t017l129lvi0mp03yqh8/678vqu786ypkw1z59e.php"></script>
                            <div data-la-block="bce83f50-d70b-450b-ac54-bd42b3194ea5"></div>

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

                    <script async src="//bpioqb.com/xws17l192/vil0mp/0y3h8q768quv/687pyknqo.php"></script>
                    <div data-la-block="d3c54e9d-c038-4ba1-b73a-4d3a76f41338"></div>

                    @include('layouts.rigthFullNews', compact('rnews'))

                </div>
            </div>
        </div>
        <div class="container container-list w-100">
            <div class="items-box" id="load">

                @include('layouts.news', compact('tnews'))

            </div>
            {{--            <div class="loader"><img src="./assets/img/loading.gif"></div>--}}
        </div>
    </main>

@endsection
