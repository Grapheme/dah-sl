$('.hover-star').rating({ 
	focus: function(value, link){
		var tip = $('#hover-test');
		tip[0].data = tip[0].data || tip.html();
		tip.html(link.title || 'value: '+value);
	},
	required: 'hide'
});