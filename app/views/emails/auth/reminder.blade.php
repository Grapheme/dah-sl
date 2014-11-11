<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Сброс пароля</h2>
		<div>
			Чтобы сбросить пароль, заполните эту форму: {{ URL::to('password/reset',array($token)) }}.
		</div>
	</body>
</html>