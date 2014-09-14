<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingTable extends Migration {

    public function up(){
        Schema::create('booking', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_type')->default(0)->unsigned()->nullable();
            $table->string('room_count',10)->nullable();
            $table->string('name',128)->nullable();
            $table->string('date-in')->nullable();
            $table->string('date-out')->nullable();
            $table->string('date')->nullable();
            $table->string('service')->nullable();
            $table->string('adults')->nullable();
            $table->string('children')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

	public function down(){
		Schema::drop('booking');
	}
}
