@if(Config::get('app.use_googleapis'))
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.10.2.min.js');}}"><\/script>')</script>
@else
	{{HTML::script('js/vendor/jquery-1.10.2.min.js');}}
@endif
{{HTML::script('js/vendor/jquery.form.js');}}
{{HTML::script('js/libs/base.js');}}
{{HTML::script('js/plugins.js');}}
{{HTML::script('js/main.js');}}
{{HTML::script('js/libs/guest.js');}}