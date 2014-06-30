<!DOCTYPE html>
<html>
<body>
	Посетитель, представившийся как <?=Input::get('name');?>, оставил заявку на проведение мероприятия <?=Input::get('date');?>
	<br/>Количество человек: <?=Input::get('adults');?>
	<br/>Комментарий: <?=Input::get('text');?>

	<br/><br/>Контактные данные 
	<br/>Телефон: <?=Input::get('phone');?>
	<br/>Электронная почта: <?=Input::get('email');?>
</body>
</html>