<?php
class plural {
	
	public static function pluralWords($count,$words,$btag='',$etag=''){
		
		return $btag.$count.$etag.' '.self::getWord($count,$words);
	}
	
	public static function pluralUsers($count){
		
		$words = array('пользователь','пользователя','пользователей');
		return self::getWord($count,$words);
	}
	
	public static function pluralComments($count){
		
		$words = array('комментарий','комментария','комментариев');
		return self::getWord($count,$words);
	}
	
	public static function pluralVisits($count){
		
		$words = array('просмотр','просмотра','просмотров');
		return self::getWord($count,$words);
	}
	
	private static function getWord($n,$words){
		
		$count = (int)$n;
		if(!is_numeric($count)):
			return FALSE;
		endif;
		
		$n = abs($n) % 100;
		$n1 = $n % 10;
		if ($n > 10 && $n < 20) return $words[2];
		if ($n1 > 1 && $n1 < 5) return $words[1];
		if ($n1 == 1) return $words[0];
		return $words[2];
	}
}