/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

function isValidEmailAddress(emailAddress){
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	if(emailAddress == ''){
		return false;
	}else{
		return pattern.test(emailAddress);
	}
};
$.fn.emptyValue = function(){
	if($(this).val().trim() == ''){
		return true;
	}else{
		return false;
	}
}
$.fn.ForceNumericOnly = function(){
	return this.each(function(){
		$(this).keydown(function(e){
			var key = e.charCode || e.keyCode || 0;
			return(key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
		});
	});
};
function resetErrors(jForm){
	
	$(".booking-main-error").addClass('hidden');
	$(jForm).find(".error").each(function(i,element){
		$(this).removeClass('error');
		$(this).find('.form-error').remove();
	});
}
function validation(jForm){
	
	var valid = true;
	$(jForm).find(".valid-required").each(function(i,element){
		if($(this).emptyValue()){
			$(this).parents('.form-input-element').addClass('error').append('<div class="form-error">Не заполнено обязательное поле</div>');
			valid = false;
		}
	});
	if($(jForm).find(".valid-email").length > 0){
		if(isValidEmailAddress($(jForm).find("input.valid-email").val().trim()) === false){
			$(jForm).find("input.valid-email").parents('.form-input-element').addClass('error').append('<div class="form-error">Неверный Email адрес</div>');
			valid = false;
		}
	}
	if($(jForm).find(".radio-select:checked").val() == 'undefined'){
		$(this).parents('.form-input-element').addClass('error').append('<div class="form-error">Не заполнено обязательное поле</div>');
		valid = false;
	}
	return valid;
}

$(function(){
	$(".btn-submit").click(function(){
		var _form = $(this).parents('form');
		resetErrors(_form);
		if(validation(_form) === false){
			$(".booking-main-error").removeClass('hidden');
			return false;
		}
	});
	$(".btn-ajax-submit").click(function(){
		var _form = $(this).parents('form');
		var options = {target: null,beforeSubmit: {},dataType:'json',type:'post'};
		options.beforeSubmit = function(formData,jqForm,options){
			resetErrors(_form);
			if(validation(_form) === false){
				$(".booking-main-error").removeClass('hidden');
				return false;
			}
		}
		options.success = function(response,status,xhr,jqForm){
			if(response.status){
				$(_form).replaceWith('<div class="request-mail">'+response.responseText+'</div>');
				$('.leave-a-msg').hide();
				setTimeout( function(){ $('.request-mail').css( 'padding', '1.5em 0 2em'); }, 400);
			}else{
				alert(response.responseText);
			}
		}
		$(_form).ajaxSubmit(options);
		return false;
	});
	$("input.valid-numeric").ForceNumericOnly();
	$("#operation-more").click(function(){
		$.ajax({
			url: BASIC.getBaseURL('reviews/load-reviews'),type: 'POST',dataType: 'json',
			data:{'skip':$("#operation-more").attr('data-skip')},
			beforeSend: function(){},
			success: function(response,textStatus,xhr){
				if(response.status){
					$("#more-list").append(response.responseText);
					if(response.hasMore !== false){
						$("#operation-more").attr('data-skip',response.hasMore);
					}else{
						$("#operation-more").parents('.show-more-container').hide();
					}
				}
			},
			error: function(xhr,textStatus,errorThrown){}
		});
	})
});