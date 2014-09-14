<?php

class PaymentController extends \BaseController {

	/*
	 * Отдает форму оплаты для заданного счета
	 */
	public function paymentForm() {
		
		$json_result = array('message'=>'Счет не найден. Проверьте правильность введенных данных.','status'=>FALSE);
		if($bill = Bills::where('id',Input::get('number'))->first()):
			if(!empty($bill->payer)):
				$fio = explode(' ',$bill->payer);
				if(isset($fio[0]) && mb_strtolower($fio[0]) == mb_strtolower(Input::get('secret_word'))):
					$json_result['message'] = self::getView('users_interface.forms.pay-form',compact('bill'));
					$json_result['status'] = TRUE;
				endif;
			endif;
		endif;
		echo json_encode($json_result);
	}

	/* 
	 * Страницы, на которые будет перенаправлен пользователь 
	 * в результате: успешной оплаты, ошибки и отмены
	 */
	public function onSuccess() {
		return View::make('users_interface.payment-done');
	}
	
	public function onFail() {
		return View::make('users_interface.payment-fail');
	}

	public function onReturn() {
		return Redirect::to('payment');
	}

	/* 
	 * Обработчик запроса от системы moneta.ru
	 * Вызывается при успешной оплате.
	 */
	public function paymentCallback() {
		
		// Получаем секретный ключ из конфигурации
		$securityCode = Config::get("payment.secret_key");
		
		$signature = md5(
			Input::get("MNT_ID") .
			Input::get("MNT_TRANSACTION_ID") .
			Input::get("MNT_OPERATION_ID") .
			Input::get("MNT_AMOUNT") .
			Input::get("MNT_CURRENCY_CODE") .
			Input::get("MNT_SUBSCRIBER_ID") .
			Input::get("MNT_TEST_MODE") .
			$securityCode
		);
		// Потверждаем подлинность системы оплаты
		if( $signature === Input::get("MNT_SIGNATURE")) {
			$id = Input::get("MNT_TRANSACTION_ID");

			// Обновляем счет
			$bill = Bills::findOrFail( $id );
			$bill->paid = true;
			$bill->paid_at = new DateTime;
			$bill->save();
			try {
				Mail::send('emails.payment-success',array('data'=>$bill),function($message){
					$message->from('dah-sl@yandex.ru','Даховская Слобода');
					$message->to('support@grapheme.ru')->subject('Даховская Слобода - оплата брони');
				});
			} catch (\Exception $e) {
			
			}
			return "SUCCESS";
		}

		return "FAIL";
	}

}