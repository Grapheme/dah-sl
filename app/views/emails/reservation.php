<!DOCTYPE html>
<html>
<body>
    <?php $countRooms = (Input::get('room_count')) ? Input::get('room_count') : 1; ?>
	Посетитель, представившийся как <?=Input::get('name');?>, забронировал <?= $countRooms.' '.Lang::choice('номер|номера|номеров', $countRooms, array(), 'ru'); ?> <?=Input::get('desired-num-radio');?> с <?=Input::get('date-in');?> по <?=Input::get('date-out');?>
	<br/>Количество взрослых: <?=Input::get('adults');?>
	<br/>Количество детей от 6 до 12 лет: <?=Input::get('children');?>

	<br/><br/>Контактные данные 
	<br/>Телефон: <?=Input::get('phone');?>
	<br/>Электронная почта: <?=Input::get('email');?>
</body>
</html>