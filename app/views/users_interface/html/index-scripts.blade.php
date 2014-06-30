<script src="{{asset('js/vendor/fotorama.js');}}"></script>
<script src="{{asset('js/vendor/jquery.sorgalla.js');}}"></script>
<script>
	$(function(){
		var jcarousel = $('.jcarousel');
		jcarousel.on('jcarousel:reload jcarousel:create', function() {
			var width = jcarousel.innerWidth();
			if (width >= 600) {
				width = width / 3;
			} else if (width >= 350) {
				width = width / 2;
			}
			jcarousel.jcarousel('items').css('width', width + 'px');
		}).jcarousel({
			wrap : 'circular'
		});
		$('.jcarousel-control-prev').jcarouselControl({
			target : '-=3'
		});

		$('.jcarousel-control-next').jcarouselControl({
			target : '+=3'
		});

		$('.jcarousel-pagination').on('jcarouselpagination:active', 'a', function() {
			$(this).addClass('active');
		}).on('jcarouselpagination:inactive', 'a', function() {
			$(this).removeClass('active');
		}).on('click', function(e) {
			e.preventDefault();
		}).jcarouselPagination({
			perPage : 3,
			item : function(page) {
				return '<a href="#' + page + '">' + page + '</a>';
			}
		});
	});
</script>
<script src="{{asset('js/vendor/jquery.selectbox.min.js');}}"></script>
<script src="{{asset('js/vendor/jcarousel-exec.js');}}"></script>
<script>
	try {
		$('.styled-select').selectbox({
			onOpen:function(inst){},
			onClose:function(inst){},
			onChange:function(val,inst){
				$('.styled-select').val(val);
			},
			effect : "slide"
		});
	} catch(e) {

	};
</script>