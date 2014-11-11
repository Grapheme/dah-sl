<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	@include('users_interface.includes.head')
	{{ HTML::style('css/jquery.fancybox.css') }}
</head>
<body>
	@include('users_interface.includes.ie7')
	<article class="wrapper">
		@include('users_interface.includes.header')
		@include('users_interface.html.about-content')
		@include('users_interface.includes.footer')
	</article>
	@include('users_interface.includes.scripts')
	{{HTML::script('js/vendor/jquery.fancybox.pack.js');}}
	<script>
	var thisHash = 'elem-' + window.location.hash;
	$(document).ready(function() {
		$(".fancybox").fancybox({
			padding: 25,
			helpers: {
	    			overlay: {
	      				locked: false
	    			},
	    			title: {
	    				type: 'inside'
	    			}
	  		},
	  		beforeLoad: function() {
	  			var el, id = $(this.element).data('title-id');
	  			
	  			if (id) {
	  				el = $('#' + id);
	 				
		  				if (el.length) {
	  					this.title = el.html();
	  				}
	  			}
	  			var idAttr = this.element.attr("id")

	            if (idAttr) {
	                window.location.hash = 'elem-' + idAttr;
	            }
	  		},
	  		beforeShow: function(){
	  			var id = this.element.attr("id")
	            if (id) {
	                window.location.hash = 'elem-' + id;
	            }
	  		},
	  		beforeClose: function(){
	  			window.location.hash = "_";
	  		}
		});
		
		if(thisHash) {
			$(thisHash.replace('elem-', '')).trigger('click');
		}
	});
	</script>
	@include('users_interface.includes.typekit')
	@include('users_interface.includes.analytics')
</body>
</html>