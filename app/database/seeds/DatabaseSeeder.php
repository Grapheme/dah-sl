<?php

class DatabaseSeeder extends Seeder {

	public function run(){
		Eloquent::unguard();
		
		$this->call('UserTableSeeder');
		$this->call('RoomsTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('Room_propertiesTableSeeder');
		$this->call('ImagesTableSeeder');
		$this->call('ReviewsTableSeeder');
		$this->call('ServicesTableSeeder');
		$this->call('SightsTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('ActionsTableSeeder');
	}

}