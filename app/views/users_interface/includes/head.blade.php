<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ Page::getField('page_title') }}</title>
<meta name="description" content="{{ Page::getField('page_description') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="icon" type="image/png" href="{{asset('favicon.png');}}" >
{{ HTML::style('css/normalize.css') }}
{{ HTML::style('css/fonts.css') }}
{{ HTML::style('css/fotorama.css') }}
{{ HTML::style('css/main.css') }}
{{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}