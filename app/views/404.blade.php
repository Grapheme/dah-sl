<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Page Not Found :(</title>
        <link rel="stylesheet" href="{{asset('css/fonts.css')}}" >
        <link rel="icon" type="image/png" href="{{asset('favicon.png');}}" >
        <style>
        html { font: 100% 'pt-serif', serif; color: #6C4742; }
        html,
        body {        	 
			height: 100%;
			min-height: 572px;
			margin: 0;
			padding: 0;
        }
		body {
			position: relative;
			background: url(../img/texture.gif); 
			-moz-box-shadow: 0 0 0 17px #FFF inset;
			-webkit-box-shadow: 0 0 0 17px #FFF inset;
			box-shadow: 0 0 0 17px #FFF inset;
		}
		.wrapper-404 { width: 96%; max-width: 1146px; min-width: 320px; margin: 0 auto; padding: 34px 2% 2%; }         
		.waves {
		    background: url("../img/wave.gif") repeat-x scroll 0 center rgba(0, 0, 0, 0);
		    margin: 0 3%;
		    text-align: center;
		}		
		.left-wave, .right-wave {
		    background: url("../img/wave.png") repeat-x scroll 0 0 rgba(0, 0, 0, 0);
		    display: none;
		    height: 15px;
		    width: 120px;
		}
		.error-head {
		    background: url("../img/texture.gif") repeat scroll 0 0 rgba(0, 0, 0, 0);
		    display: inline-block;
		    font: 56px 'jaf-zalamander',serif;
		    letter-spacing: 28px;
		    margin: 0;
		    padding-left: 25px;
		    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.6);
		    text-transform: uppercase;
		    width: 72%;
		    color: #6C463F;
		}
		.logo { 
			width: 206px; 
			height: 229px;
			margin: 0.07em auto 1.5em;
			text-indent: -9999px;
			background: url(../img/sloboda_sprite.png) no-repeat;
			font-size: 2em;
		}
		.dev > a{
			transition: all .15s ease;
			-webkit-transition: all .15s ease;
			-moz-transition: all .15s ease;
			-o-transition: all .15s ease;
			-ms-transition: all .15s ease;
		}
		.dev { margin: 0.4em 0 0.2em; }
		.dev > a { display: inline-block; height: 18px; color: #6C4742; text-decoration: none; border-bottom: 1px solid rgba(108, 71, 66, .5); }
		.dev > a:hover { color: #00A2BF; border-color: transparent; }
		.error { margin: 2em 0; font-size: 1em; text-align: center; }
		.error-link { color: #6c4742; }
		.error-link:hover { color:#00A2BF; }
		.footer { position: absolute; left: 0; bottom: 2em; width: 100%; text-align: center; }
        </style>
    </head>
    <body>
        <div class="wrapper-404">
        	<div class="header-404">
        		<h1 class="logo">Даховская Слобода</h1>
        		<div class="waves">
					<div class="left-wave"></div>
						<div class="error-head">404</div>
					<div class="right-wave"></div>
				</div>
        	</div>
        	<div class="error">
        		Адрес набран неправильно или не существует<br>
        		Перейти <a class="error-link" href="{{url('/')}}">на главную страницу</a> сайта.
        	</div>
        	<div class="footer">
        		&copy; Туристический комплекс «Даховская Слобода»
        		<div class="dev">
					Разработано агентством «<a target="_blank" href="http://grapheme.ru">Графема</a>», 2013
				</div>
        	</div>
        </div>
        @include('users_interface.includes.typekit')
    </body>
</html>
