/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
 
var BASIC = BASIC || {};
var ajaxFormConfig = ajaxFormConfig || {target: null,dataType:'json',type:'post'};
var Messages = Messages || {}

BASIC.baseURL = window.location.protocol+'//'+window.location.hostname+'/';
BASIC.currentURL = window.location.href;

BASIC.isValidEmailAddress = function(emailAddress){
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	if(emailAddress != ''){return pattern.test(emailAddress);}
	return true;
};
BASIC.isValidPhone = function(phoneNumber){
	var pattern = new RegExp(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i);
	if(phoneNumber == ''){
		return false;
	}else{
		return pattern.test(phoneNumber);
	}
};
BASIC.getBaseURL = function(url){
	return BASIC.baseURL+url;
}

BASIC.RedirectTO = function(path){window.location=path;}
BASIC.minLength = function(string,Len){if(string != ''){if(string.length < Len){return false}}return true}

ajaxFormConfig.beforeSubmit = function(formData,jqForm,options){
	if($("span.message-lable").exists() == true){
		$("span.message-lable").remove();
	}
	$(jqForm).find('.btn-loading').addClass('loading').attr('disabled','disabled');
}
ajaxFormConfig.success = function(responseText,statusText,xhr,jqForm){
	$(jqForm).find(".btn-loading").removeClass('loading').removeAttr('disabled','disabled');
	if(responseText.status){
		$(jqForm).find(".form-operation").after(Message.success(responseText.message));
		if(responseText.redirect !== false){
			BASE.RedirectTO(responseText.redirect);
		}
	}else{
		$(jqForm).find(".form-operation").after(Message.error(responseText.message));
	}
}

Messages.error = function(text){return '<span class="label label-danger message-lable">'+text+'</span>';}
Messages.success = function(text){return '<span class="label label-success message-lable">'+text+'</span>';}
Messages.info = function(text){return '<span class="label label-info message-lable">'+text+'</span>';}
Messages.warning = function(text){return '<span class="label label-warning message-lable">'+text+'</span>';}

$.fn.exists = function(){
	if($(this).length > 0){
		return true;
	}else{
		return false;
	}
}
$.fn.emptyValue = function(){
	if($(this).val().trim() == ''){
		return true;
	}else{
		return false;
	}
}

$(function(){
	$(".delete-action").click(function(){if(confirm('Удалить запись?') == false){return false;}});
	$(".no-clickable").click(function(event){event.preventDefault();event.stopPropagation();});
});