<?php
class priceFormatter
 {
	
	public static function Format($price) {
		return strrev(chunk_split(strrev($price), 3, ' '));
	}
}