<script src="<?=asset('js/vendor/zebra.datepicker.js');?>"></script>
<script>
	var daysArr = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
		daysAbbrArr = ['ВС', 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'],
		monthArr = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
		monthAbbrVar = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
	
	$('input.datepicker#first-date').Zebra_DatePicker({
		format: 'd M Y',
		direction : true,
		pair: $('input.datepicker#last-date'),
		show_clear_date : false,
		days : daysArr,
		days_abbr : daysAbbrArr,
		months : monthArr,
		months_abbr : monthAbbrVar,
		select_other_months : true
	});
	$('input.datepicker#last-date').Zebra_DatePicker({
		format: 'd M Y',
		direction : 1,
		show_clear_date : false,
		days : daysArr,
		days_abbr : daysAbbrArr,
		months : monthArr,
		months_abbr : monthAbbrVar,
		select_other_months : true
	});
</script>