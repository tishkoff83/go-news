<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
    <title>@yield('title')</title>
    <meta name="description" content="Ваша главная новостная лента: новости политики, мира и шоу-бизнеса на Вашей ленте новостей." />
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script async src="//bpioqb.com/smd1l7/921vli/pm0y30q8h687vqu687pyk3g.php"></script>
    <script async src="//bpioqb.com/ven7l1/921vli0mp0y3/q8h867uqv/876/ypkl6qgv2.php"></script>
    <script async src="//bpioqb.com/9nm7l1921/ilv0mp3y0/8qh786/vuq687kpy9pkeh.php"></script>
    <script async src="//bpioqb.com/u8vl71129ivl/0pm/y30/qh8/867vuq786ykprcns.php"></script>
    <script type="text/javascript"> rbConfig={start:performance.now(),rbDomain:"newrrb.bid",rotator:'16s7h'};</script>
    <script async="async" type="text/javascript" src="//newrrb.bid/16s7h.min.js"></script>

</head>
<body>
<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
    </div>
</div>
<header class="header">
    <div class="container container-header">
        <div class="logo">
           <p>ok-news</p>
        </div>
        <div class="navigation" id="nav">
            <a  href="./index.php?category=7">События</a>
            <a  href="./index.php?category=27">Здоровье</a>
            <a  href="./index.php?category=17">Интересное</a>
            <a  href="./index.php?category=6">Экономика</a>
            <a  href="./index.php?category=5">Общество</a>
            <a  href="./index.php?category=2">Шоу-бизнес</a>
            <a  href="./index.php?category=3">Происшествия</a>
            <a class="icon" onclick="toggleNav()">
                &#9776;
            </a>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer">
    <div class="container container-header">
        <div class="logo">
            <p>ok-news.online</p>
        </div>
    </div>
</footer>
<script src="{{ asset('js/script.js') }}"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(47837288, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/47837288" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!--LiveInternet counter--><script type="text/javascript">
    document.write('<a href="//www.liveinternet.ru/click" '+
        'target="_blank"><img src="//counter.yadro.ru/hit?t45.1;r'+
        escape(document.referrer)+((typeof(screen)=='undefined')?'':
            ';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
            screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
        ';h'+escape(document.title.substring(0,150))+';'+Math.random()+
        '" alt="" title="LiveInternet" '+
        'border="0" width="1" height="1"><\/a>')
</script><!--/LiveInternet-->
</body>
</html>
