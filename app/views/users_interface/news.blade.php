<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
    @include('users_interface.includes.head')
</head>
<body>
@include('users_interface.includes.ie7')
<article class="wrapper">
    @include('users_interface.includes.header')
    @if(!empty($news->image))
    <section class="room">
        <section class="index-slideshow valentine-slide">
            <div class="fotorama" data-autoplay="5000" data-loop="true" data-fit="cover">
                {{ HTML::image($news->image,$news->title) }}
            </div>
        </section>
    </section>
    @endif
    <section class="clearfix">
        <div class="restaurant">
            <div class="waves">
                <div class="left-wave"></div>
                <h1 class="long">{{ $news->title }}</h1>
                <div class="right-wave"></div>
            </div>
            <div class="page-description">
                {{ $news->previrew }}
            </div>
            {{ $news->content }}
        </div>
    </section>
    @include('users_interface.includes.footer')
</article>
@include('users_interface.includes.scripts')
@include('users_interface.includes.typekit')
@include('users_interface.includes.analytics')
</body>
</html>