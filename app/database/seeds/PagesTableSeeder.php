<?php

class PagesTableSeeder extends Seeder {

	public function run(){

		DB::table('pages')->truncate();

		$pages = array(
			array('page_title'=>'Главная','page_description'=>'Главная','page_url'=>'home','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'О комплексе','page_description'=>'О комплексе','page_url'=>'about','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Услуги','page_description'=>'Услуги','page_url'=>'services','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Бронирование услуги','page_description'=>'Бронирование услуги','page_url'=>'services/booking','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Номера','page_description'=>'Номера','page_url'=>'rooms','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Бронирование номера','page_description'=>'Бронирование номера','page_url'=>'rooms/booking','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Кафе','page_description'=>'Кафе','page_url'=>'restaurant','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Что смотреть?','page_description'=>'Что смотреть?','page_url'=>'sights','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Отзывы','page_description'=>'Отзывы','page_url'=>'reviews','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Контакты','page_description'=>'Контакты','page_url'=>'contacts','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Онлайн оплата','page_description'=>'Онлайн оплата','page_url'=>'payment','page_h1'=>'','page_content'=>'','readonly'=>1,'group'=>'static','item_id'=>0),
			array('page_title'=>'Стандарт','page_description'=>'','page_url'=>'rooms/standart','page_h1'=>'Стандарт','page_content'=>'','readonly'=>1,'group'=>'dinamic','item_id'=>1),
			array('page_title'=>'Улучшенный','page_description'=>'','page_url'=>'rooms/improved','page_h1'=>'Улучшенный','page_content'=>'','readonly'=>1,'group'=>'dinamic','item_id'=>2),
			array('page_title'=>'Семейный','page_description'=>'','page_url'=>'rooms/family','page_h1'=>'Семейный','page_content'=>'','readonly'=>1,'group'=>'dinamic','item_id'=>3),
			array('page_title'=>'Семейный 2-х комнатный','page_description'=>'','page_url'=>'rooms/family-2-room','page_h1'=>'Семейный 2-х комнатный','page_content'=>'','readonly'=>1,'group'=>'dinamic','item_id'=>4),
			array('page_title'=>'Эконом','page_description'=>'','page_url'=>'rooms/econom','page_h1'=>'Эконом','page_content'=>'','readonly'=>1,'group'=>'dinamic','item_id'=>5),
		);
		DB::table('pages')->insert($pages);
	}
}
