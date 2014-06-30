$(function(){
	$('.comfort-list').tooltip({
		position: {
			my: "center bottom-15",
			at: "center top",
			using: function( position, feedback ) {
	          $( this ).css( position );
	          $( "<div>" )
	            .addClass( "arrow-tooltip" )
	            .addClass( feedback.vertical )
	            .addClass( feedback.horizontal )
	            .appendTo( this );
	        }
		}
	});
});