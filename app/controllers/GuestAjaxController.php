<?php

class GuestAjaxController extends BaseController {
	
	var $json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>FALSE,'responsePhotoSrc'=>'');
	
	public function booking(){
		
		if(Request::ajax()):
			$rules = array('date-in'=>'required','date-out'=>'required','desired-num-radio'=>'required','adults'=>'required','children'=>'required','name'=>'required','phone'=>'required','email'=>'required|email');
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()):
				$this->json_request['responseText'] = 'Неверно заполнены поля';
			else:
				Mail::send('emails.reservation',array('data'=>Input::all()),function($message){
					$message->from('dah-sl@yandex.ru','Даховская Слобода');
					$message->to('dahovskaya_sloboda@rambler.ru')->cc('support@grapheme.ru')->subject('Даховская Слобода - бронирование номера');
				});
				$this->json_request['responseText'] = 'Заявка на бронирование номера отправлена';
				$this->json_request['status'] = TRUE;
			endif;
		else:
			App::abort(404);
		endif;
		echo json_encode($this->json_request);
	}

	public function service_booking(){
		
		if(Request::ajax()):
			$rules = array('date'=>'required','adults'=>'required','name'=>'required','phone'=>'required','email'=>'required|email');
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()):
				$this->json_request['responseText'] = 'Неверно заполнены поля';
			else:
				Mail::send('emails.services-booking',array('data'=>Input::all()),function($message){
					$message->from('dah-sl@yandex.ru','Даховская Слобода');
					$message->to('dahovskaya_sloboda@rambler.ru')->cc('support@grapheme.ru')->subject('Даховская Слобода - заявка');
				});
				$this->json_request['responseText'] = 'Заявка на бронирование услуги отправлена';
				$this->json_request['status'] = TRUE;
			endif;
		else:
			App::abort(404);
		endif;
		echo json_encode($this->json_request);
	}
	
	public function review(){
		
		if(Request::ajax()):
			$rules = array('name'=>'required','email'=>'required|email','place'=>'required','text'=>'required','rating'=>'required');
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()):
				$this->json_request['responseText'] = 'Неверно заполнены поля';
			else:
				$review = new Review;
				$review->author = Input::get('name');
				$review->email = Input::get('email');
				$review->city = Input::get('place');
				$review->content = Input::get('text');
				$review->sort = 0;
				$review->raiting = Input::get('rating');
				$review->valid = 0;
				$review->save();
				Mail::send('emails.review',array('data'=>Input::all()),function($message){
					$message->from('dah-sl@yandex.ru','Даховская Слобода');
					$message->to('dahovskaya_sloboda@rambler.ru')->cc('support@grapheme.ru')->subject('Даховская Слобода - Отзыв');
				});
				$this->json_request['responseText'] = 'Спасибо за Ваш отзыв';
				$this->json_request['status'] = TRUE;
			endif;
		else:
			App::abort(404);
		endif;
		echo json_encode($this->json_request);
	}
	
	public function load_reviews(){
		
		if(Request::ajax()):
			$rules = array('skip'=>'required|numeric');
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()):
				$this->json_request['responseText'] = 'Отсутствует необходимый параметр';
			else:
				$skip = (int)Input::get('skip');
				$reviews = Review::where('valid',1)
					->orderBy('created_at','DESC')->orderBy('sort')
					->take($this->skip_rows)->skip($skip)->get();
				$more = FALSE;
				if(($skip+$this->skip_rows) < Review::count()):
					$more = $skip+$this->skip_rows;
				endif;
				$raiting = $this->raiting;
				$this->json_request['responseText'] = self::getView('users_interface.html.reviews-list',compact('reviews','raiting'));
				$this->json_request['hasMore'] = $more;
				$this->json_request['status'] = TRUE;
			endif;
		else:
			App::abort(404);
		endif;
		echo json_encode($this->json_request);
	}
}