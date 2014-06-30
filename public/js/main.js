var $window = $(window),
	$document = $(document),
	sloboda = sloboda || {},
	$roomlist = $('.roomlist'),
/*-------room columns----------*/
	$roomItemLeft = $('.room-item-left'),
	$roomItemRight = $('.room-item-right'),
	$jcarouselFlag = 3;

sloboda.mobileMenu = {
	trigger: $('#mobile-trigger')
};
sloboda.mobileMenu.trigger.click( function() {
	var mobileContainer = $('.mobile-nav');
	mobileContainer.slideToggle( 800 );
	if( $('.mobile-active')[0]) {
		$(this).removeClass('active-mobile-trigger');
		mobileContainer.removeClass('mobile-active');
	} else {
		$(this).addClass('active-mobile-trigger');
		mobileContainer.addClass('mobile-active');
	}	
});
/*-------user functions----------*/
sloboda.changeCarouselPgntn = function() {
	if($('.jcarousel')[0]){
		if(($jcarouselFlag == 1) && $window.width() > 700) {
			$('.jcarousel-pagination').jcarouselPagination({
			    'perPage': 3
			});
			$('.jcarousel-control-prev').jcarouselControl({
				target : '-=3'
			});
			$('.jcarousel-control-next').jcarouselControl({
				target : '+=3'
			});
			$jcarouselFlag = 3;
		};
		if(($jcarouselFlag == 3) && $window.width() < 700) {
			$('.jcarousel-pagination').jcarouselPagination({
			    'perPage': 1
			});
			$('.jcarousel-control-prev').jcarouselControl({
				target : '-=1'
			});
			$('.jcarousel-control-next').jcarouselControl({
				target : '+=1'
			});
			$jcarouselFlag = 1;
		};
	};
};
sloboda.alignRoomColumns = function(columnA, columnB) {
	columnB.height( columnA.height() );
};
sloboda.bindOnClick = function(button, target, speed) {
	speed = (!speed)? '800': speed;
	button.click( function(){
		target.slideToggle(speed);
	});
};
$document.ready( function(){
	$roomItemLeft.find('img').load(function(){		
		if($roomlist[0] && $window.width() > 880) { sloboda.alignRoomColumns($roomItemLeft, $roomItemRight); }
	});
	sloboda.bindOnClick($('.leave-a-msg'), $('.review-form'), 800);
	$('no-clickable').click( function(e){
		e.preventDefault();
	});
	$('.sights-map').click( function(){
		if (!$(this).hasClass('active')) {
			$('ul.sights-list').hide();
			$('section.map').show();
			$('.sights-switcher .active').removeClass('active');
			$(this).addClass('active');
		}		
	});
	$('.sights-photos').click( function(){
		if (!$(this).hasClass('active')) {
			$('ul.sights-list').show();
			$('section.map').hide();
			$('.sights-switcher .active').removeClass('active');
			$(this).addClass('active');
		}
	});

	if($window.width() < 768) { $('.sights-photos').trigger('click'); }
	/*-----------form error reset------------*/
	$document.on( 'focus', '.error input, .error textarea', function() {
		$(this).parent().parent().removeClass('error');
	});
	$document.on( 'click', '.error .sbHolder', function() {
		$(this).parent().removeClass('error');
	});
	
});
$window.resize( function(){
	var $mobileActive = $('.mobile-active');
	if($mobileActive[0] && $window.width() > 768) { $mobileActive.removeClass('mobile-active').removeAttr('style'); sloboda.mobileMenu.trigger.removeClass('active-mobile-trigger');}	
	if($roomlist[0] && $window.width() > 880) { sloboda.alignRoomColumns($roomItemLeft, $roomItemRight); }	
	/*-----------Map------------*/
	if($window.width() < 768 && $('.sights-map').hasClass('active')) { $('.sights-photos').trigger('click'); }
});
