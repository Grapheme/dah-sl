<!DOCTYPE html>
<html>
<body>
	Гость <?=$data->payer;?> произвел успешную оплату на сумму <?=$data->price;?> руб. 
	<br/>Дата оплаты: <?= myDateTime::monthsTime($data->updated_at) ;?>
	<br/>Оплаченная услуга: <?=$data->service;?>
</body>
</html>