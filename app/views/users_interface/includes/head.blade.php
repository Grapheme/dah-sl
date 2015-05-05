@section('title')
{{{ isset($page->page_title) ? $page->page_title : Page::getField('page_title') }}}
@stop
@section('description')
{{{ isset($page->page_description) ? $page->page_description : Page::getField('page_description') }}}
@stop
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="icon" type="image/png" href="{{asset('favicon.png');}}" >
{{ HTML::style('css/normalize.css') }}
{{ HTML::style('css/fonts.css') }}
{{ HTML::style('css/fotorama.css') }}
{{ HTML::style('css/main.css') }}
{{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}