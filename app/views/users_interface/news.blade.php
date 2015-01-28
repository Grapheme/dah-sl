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
    <section class="clearfix">
        <h1>{{ $news->title }}</h1>
    </section>
    <section class="clearfix">
        {{ $news->content }}
    </section>
    @include('users_interface.includes.footer')
</article>
@include('users_interface.includes.scripts')
@include('users_interface.includes.typekit')
@include('users_interface.includes.analytics')
</body>
</html>