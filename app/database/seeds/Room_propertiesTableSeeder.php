<?php

class Room_propertiesTableSeeder extends Seeder {

	public function run(){
		DB::table('room_properties')->truncate();

		$room_properties = array(
			array('title'=>'Сплит-система','class_name'=>'split','sort'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Платяной шкаф','class_name'=>'comod','sort'=>2,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Холодильник','class_name'=>'refr','sort'=>3,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Душ','class_name'=>'shower','sort'=>4,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Набор из двух полотенец','class_name'=>'double-towel','sort'=>5,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Телевизор','class_name'=>'tv','sort'=>6,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Чайник','class_name'=>'teapot','sort'=>7,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Набор кружек','class_name'=>'mugset','sort'=>8,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Фен','class_name'=>'dryer','sort'=>9,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Полотенце','class_name'=>'towel','sort'=>10,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Душевая и туалет на блок, состоящий из двух номеров','class_name'=>'shower','sort'=>11,'created_at'=>new DateTime,'updated_at'=>new DateTime),
			array('title'=>'Набор стаканов','class_name'=>'mugset','sort'=>12,'created_at'=>new DateTime,'updated_at'=>new DateTime),
		);
		DB::table('room_properties')->insert($room_properties);
	}

}
