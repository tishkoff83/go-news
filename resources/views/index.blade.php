@extends('layouts.master')

@section('title', 'Ваша главная новостная лента')

@section('content')

    <main class="main">
        <div class="container container-list w-100">
            <div class="items-box">

                @include('layouts.mainNews', compact('news'))


</div>
</div>
</main>

@endsection
