<!DOCTYPE html>
<html>
<body>
	Пользователь <?=Input::get('name');?> оставил отзыв!<br/>
	Эл.почта <?=Input::get('email');?><br/>
	Из <?=Input::get('place');?><br/><br/>
	Текст отзыва <?=Input::get('text');?><br/>
	Рейтинг: <?=Input::get('rating');?> звезда(-ы)
</body>
</html>