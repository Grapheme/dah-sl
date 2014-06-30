@extends('admin_interface.cpanel')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Редактирование счета</h3>
{{ Form::open(array('action'=>array('BillsController@update',$bill['id']),'class'=>'form-horizontal','role'=>"form",'method'=>'PUT'))}}
	<div class="form-group">
		{{ Form::label('id','Номер счета',array('class'=>'control-label')) }}
		{{ Form::text('id',$bill['id'],array('class'=>'form-control','id'=>'title-edit'))}}
		<hr/>
		{{ Form::label('payer','Плательщик',array('class'=>'control-label')) }}
		{{ Form::text('payer', $bill['payer'],array('class'=>'form-control','id'=>'title-edit'))}}
		{{ Form::label('service','Услуга',array('class'=>'control-label')) }}
		{{ Form::text('service', $bill['service'], array('id'=>'service-edit','class'=>'form-control','rows'=>4))}}
		{{ Form::label('price','Сумма',array('class'=>'control-label')) }}
		{{ Form::text('price', $bill['price'], array('id'=>'price-edit','class'=>'form-control','rows'=>4))}}
	</div>
	<div class="form-group">
		{{ Form::submit('Сохранить',array('class'=>'btn btn-default')) }}
	</div>
{{ Form::close() }}
@stop