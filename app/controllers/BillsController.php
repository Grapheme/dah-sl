<?php

class BillsController extends \BaseController {

	public function show($id) { }

	public function index() {
		
		$unpaidBills = Bills::where('paid','=','0')->orderBy('created_at','DESC')->get();
		$paidBills = Bills::where('paid','=','1')->orderBy('paid_at','DESC')->get();
		return View::make('admin_interface.bills.list')->with("unpaidBills",$unpaidBills)->with("paidBills",$paidBills);
	}

	public function create(){
		
		return View::make('admin_interface.bills.create');
	}

	public function store(){
		
		$validator = Bills::validate(Input::all());
		if($validator->fails()):
			return Redirect::action('BillsController@create')->withErrors($validator)->withInput();
		else:
            if(Bills::where('id',Input::get('id'))->exists()):
                return Redirect::action('BillsController@edit',Input::get('id'))->withInput()->with('message','Счет уже существует');
            endif;
			$bill = new Bills;
			$bill->id = Input::get('id');
			$bill->payer = Input::get('payer');
			$bill->service = Input::get('service');
			$bill->price = Input::get('price');
			$bill->save();
			return Redirect::action('BillsController@index')->with('message','Счет добавлен');
		endif;
	}

	public function edit($id){
		
		return View::make('admin_interface.bills.edit')->with('bill', Bills::find($id)->toArray());
	}

	public function update($id) {
		
		$validator = Bills::validate(Input::all());
		if($validator->fails()):
			return Redirect::action('BillsController@edit',$id)->withErrors($validator)->withInput();
		else:
			$bill = Bills::find($id);
			if($exist = Bills::where('id',Input::get('id'))->first()):
				if($exist->id != $id):
					return Redirect::action('BillsController@edit',$id)->withInput()->with('message','Счет уже существует');
				endif;
			endif;
			$bill->id = Input::get('id');
			$bill->payer = Input::get('payer');
			$bill->service = Input::get('service');
			$bill->price = Input::get('price');
			$bill->save();
			return Redirect::action('BillsController@index')->with('message','Счет сохранен');
		endif;
	}

	public function delete($id) {
		Bills::destroy($id);
		return Redirect::action("BillsController@index");
	}

    /*------------------------------------------------ */

    public function statisticBills($year){

        $unpaidBills = DB::table('bills')
            ->select(DB::raw('extract(Year from created_at) as year, extract(Month from created_at) as month, count(id) as cnt, sum(price) as price'))
            ->where('paid','=','0')
            ->whereBetween('created_at', array($year.'-01-01 00:00:00', $year.'-12-31 23:59:59'))
            ->orderBy('year')
            ->orderBy('month')
            ->groupBy('year')
            ->groupBy('month')
            ->get();
        $temp = array();
        foreach ($unpaidBills as $bill):
            $temp[$bill->month]['cnt'] = $bill->cnt;
            $temp[$bill->month]['price'] = $bill->price;
        endforeach;
        $unpaidBills = $temp;

        $paidBills = DB::table('bills')
            ->select(DB::raw('extract(Year from created_at) as year, extract(Month from created_at) as month, count(id) as cnt, sum(price) as price'))
            ->where('paid','=','1')
            ->whereBetween('created_at', array($year.'-01-01 00:00:00', $year.'-12-31 23:59:59'))
            ->orderBy('year')
            ->orderBy('month')
            ->groupBy('year')
            ->groupBy('month')
            ->get();
        $temp = array();
        foreach ($paidBills as $bill):
            $temp[$bill->month]['cnt'] = $bill->cnt;
            $temp[$bill->month]['price'] = $bill->price;
        endforeach;
        $paidBills = $temp;
        return View::make('admin_interface.bills.statistic',compact('unpaidBills','paidBills'));
    }

    public function statisticBooking($year){

        $roomsBooking = DB::table('booking')
            ->select(DB::raw('extract(Year from created_at) as year, extract(Month from created_at) as month, count(id) as cnt'))
            ->where('booking_type',1)
            ->whereBetween('created_at', array($year.'-01-01 00:00:00', $year.'-12-31 23:59:59'))
            ->orderBy('year')
            ->orderBy('month')
            ->groupBy('year')
            ->groupBy('month')
            ->get();
        $temp = array();
        foreach ($roomsBooking as $bill):
            $temp[$bill->month]['cnt'] = $bill->cnt;
        endforeach;
        $roomsBooking = $temp;

        $servicesBooking = DB::table('booking')
            ->select(DB::raw('extract(Year from created_at) as year, extract(Month from created_at) as month, count(id) as cnt'))
            ->where('booking_type',2)
            ->whereBetween('created_at', array($year.'-01-01 00:00:00', $year.'-12-31 23:59:59'))
            ->orderBy('year')
            ->orderBy('month')
            ->groupBy('year')
            ->groupBy('month')
            ->get();
        $temp = array();
        foreach ($servicesBooking as $bill):
            $temp[$bill->month]['cnt'] = $bill->cnt;
        endforeach;
        $servicesBooking = $temp;
        return View::make('admin_interface.bills.booking',compact('roomsBooking','servicesBooking'));
    }

}