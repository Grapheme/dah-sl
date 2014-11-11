<?php

class RoomsTableSeeder extends Seeder {

	public function run(){
		DB::table('rooms')->truncate();

		$rooms = array(
			array('title'=>'Стандарт','housing'=>1,'small_description'=>'Уютный экологичный номер с выходом на веранду и совместным санузлом в номере. В номере 2 односпальные кровати, платяной шкаф, стол, стулья. Отопление — конвектор с возможностью индивидуальной регулировки. Пол — ковролин.','description'=>'','price'=>'2200','sort'=>1,'image'=>'img/rooms/standart.jpg','place'=>'2','properties'=>'[]','sliders'=>'[]','created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Улучшенный','housing'=>2,'small_description'=>'Комфортабельные номера. Прекрасно подходит для молодых пар. Большая французская кровать, прекрасный вид на горы и кроны заснеженных вершин. Отопление — конвектор с возможностью индивидуальной регулировки. Пол — ковролин.','description'=>'','price'=>'2500','sort'=>2,'image'=>'img/rooms/improved.jpg','place'=>'2','properties'=>'[]','sliders'=>'[]','created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Семейный','housing'=>3,'small_description'=>'Светлый, просторный 3х местный номер. Прекрасно подходит для семейных пар с одним или двумя детьми. В номере одна совместная или две односпальные кровати. Третье место кресло-кровать. Совместный санузел в номере. Отопление — конвектор с возможностью индивидуальной регулировки.','description'=>'','price'=>'2800','sort'=>3,'image'=>'img/rooms/family.jpg','place'=>'3','properties'=>'[]','sliders'=>'[]','created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Семейный 2-х комнатный','housing'=>1,'small_description'=>'Для комфортного отдыха с детьми или компанией путешественников. Cостоит из спальни с большой французской кроватью, холла с раскладным двуспальным диваном и туалетной комнатной. Отопление — конвектор с возможностью индивидуальной регулировки. Пол — ковролин.','description'=>'','price'=>'3500','sort'=>4,'image'=>'img/rooms/family-2-room.jpg','place'=>'4','properties'=>'[]','sliders'=>'[]','created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Эконом','housing'=>3,'small_description'=>'Номера категории "эконом" - отличный выбор для молодежных групп, школьников, студентов, всех тех, кто прекрасно чувствует себя в компании товарищей, предпочитает экономичный комфортный отдых. Отопление — конвектор с возможностью индивидуальной регулировки.','description'=>'','price'=>'2400','sort'=>5,'image'=>'img/rooms/econom.jpg','place'=>'4','properties'=>'[]','sliders'=>'[]','created_at'=>new DateTime,'updated_at'=>new DateTime),
		);
		DB::table('rooms')->insert($rooms);
	}

}
