<?php

class Booking extends \Eloquent {

	protected $guarded = array('id');
	protected $fillable = array('booking_type','room_count','name','date-in','date-out','date','service','adults','children','phone','email');

    protected $table = "booking";
}