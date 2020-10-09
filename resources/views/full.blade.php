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


{{--                        @foreach($fnews as $one)--}}
{{--                            <div class="item item-t item-hr add-shows">--}}
{{--                                <div class="teaser">--}}
{{--                                    <a href="@if (!is_null($one->url)) {{  route('link', $one->id) }} @else {{ route('full', $one->slug) }} @endif"--}}
{{--                                       target="_blank"></a>--}}
{{--                                    <div class="item-overlay"></div>--}}
{{--                                    <div class="item-overlay-blur">--}}
{{--                                        <img src="{{ asset($one->image) }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="item-image">--}}
{{--                                        <img src="{{ asset($one->image) }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="item-title">{{$one->title}}</div>--}}
{{--                                    --}}{{--                                         <div class="item-category">Суставы</div>--}}
{{--                                    --}}{{--                                         <div class="item-date">8 минут назад</div>--}}
{{--                                    --}}{{--                                          <div class="item-button">Подробнее</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

                        <div id="hilu-metimecolonosarupone">
                            <script>
                                !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                                    {id:'hilu-metimecolonosarupone',block:'98406', site_id:'19725'}
                                );})(window, 'mtzBlocks');
                            </script>
                        </div>

                        <div>
                            {!! $full->body !!}
                        </div>


                        <div class="item-recommended">
                            <div class="item-title">Читайте также</div>

                            <div id="gimituf-eyihujaxokudasesa">
                                <script>
                                    !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                                        {id:'gimituf-eyihujaxokudasesa',block:'98407', site_id:'19725'}
                                    );})(window, 'mtzBlocks');
                                </script>
                            </div>

{{--                            @foreach($mnews as $one)--}}
{{--                                <div class="item item-t item-hr add-shows">--}}
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
{{--                                         <div class="item-category">Суставы</div>--}}
{{--                                         <div class="item-date">8 минут назад</div>--}}
{{--                                          <div class="item-button">Подробнее</div>--}}
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
{{--                @include('layouts.news', compact('tnews'))--}}

                <div id="xom-irawucakoxaxabukeyefe">
                    <script>
                        !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                            {id:'xom-irawucakoxaxabukeyefe',block:'98257', site_id:'19725'}
                        );})(window, 'mtzBlocks');
                    </script>
                </div>
                <div id="zed-egufovanelotidutokeqo">
                    <script>
                        !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                            {id:'zed-egufovanelotidutokeqo',block:'98258', site_id:'19725'}
                        );})(window, 'mtzBlocks');
                    </script>
                </div>
                <div id="konej-idavamokecicuvaliti">
                    <script>
                        !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                            {id:'konej-idavamokecicuvaliti',block:'98403', site_id:'19725'}
                        );})(window, 'mtzBlocks');
                    </script>
                </div>
                <div id="forebul-ipidelekemohidoye">
                    <script>
                        !(function(w,m){(w[m]||(w[m]=[]))&&w[m].push(
                            {id:'forebul-ipidelekemohidoye',block:'98404', site_id:'19725'}
                        );})(window, 'mtzBlocks');
                    </script>
                </div>

            </div>
            {{--            <div class="loader"><img src="./assets/img/loading.gif"></div>--}}
        </div>
    </main>

@endsection
