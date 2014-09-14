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

        @if(!empty($actions))
        <ul class="offers-list services-section" style="padding-top: 50px">
        @foreach($actions as $action)
            <li class="offers-item meal">
            <div class="offers-bg" style="overflow: hidden; background:url({{ $action->image }}) 50% 50%; background-repeat: no-repeat; background-size: cover;">
                 <!--<img src="{{ $action->image }}">-->
            </div>
            @if($action->short)
        	<div class="offers-cont">
        		<div class="offers-item-cont">
        			<h2 class="offers-header">{{ str_replace("\n", "<br/>\n", $action->short) }}</h2>
        		</div>
        	</div>
            @endif
            <p>
                 <a class="full-link" href="{{ $action->link }}"> <span data-redactor="verified" class="wo-line-link-container"> <span class="offers-link wo-line-link"> <span class="dec-arrow"></span>{{ $action->name }} </span> </span> </a>
            </p>
            </li>
        @endforeach

        </ul>
        @else
            Нет акций.
        @endif

		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>