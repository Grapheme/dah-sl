<!DOCTYPE html>
<html>
<body>
	Посетитель, представившийся как <?=Input::get('name');?>, забронировал номер <?=Input::get('desired-num-radio');?> с <?=Input::get('date-in');?> по <?=Input::get('date-out');?>
	<br/>Количество взрослых: <?=Input::get('adults');?>
	<br/>Количество детей от 6 до 12 лет: <?=Input::get('children');?>

	<br/><br/>Контактные данные 
	<br/>Телефон: <?=Input::get('phone');?>
	<br/>Электронная почта: <?=Input::get('email');?>
</body>
</html>