$(function() {
	$('.payment-ok').click( function(e) {
		var number = $(".bill-number-input").val().trim();
		var secret_word = $(".bill-secret-input").val().trim();
		$.ajax({
			url: 'payment/form',
			data: {'number':number,'secret_word':secret_word},type: 'POST',dataType: 'json',
			beforeSend: function(){$(".payment-main-error").hide();},
			success: function(data,textStatus,xhr){
				if(data.status){
					$('.payment-form').slideUp(500);
					$(".pay-form-container").html(data.message);
					$(".pay-form-container").slideDown(500);
				}else{
					$(".payment-main-error").text(data.message).css('color','#B15152').show();
				}
			},
			error: function(xhr,textStatus,errorThrown){$(".payment-main-error").html('При отправке заявки произошел сбой.').css('color','#B15152').show();}
		});
	});
});

