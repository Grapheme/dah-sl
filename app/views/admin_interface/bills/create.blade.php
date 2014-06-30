@extends('admin_interface.cpanel')
@section('content')
<a class="btn btn-default" href="{{ URL::previous() }}">&larr; Вернуться назад</a>
<h3>Создание счета</h3>
{{ Form::open(array('action'=>'BillsController@store','class'=>'form-horizontal','role'=>"form",'files'=>TRUE)) }}
<div class="form-group">
	{{ Form::label('id','Номер счета',array('class'=>'control-label')) }}
	{{ Form::text('id','', array('class'=>'form-control','id'=>'number-edit'))}}
	<hr/>
	{{ Form::label('payer','Плательщик',array('class'=>'control-label')) }}
	{{ Form::text('payer','', array('class'=>'form-control','id'=>'payer-edit'))}}
	{{ Form::label('service','Услуга',array('class'=>'control-label')) }}
	{{ Form::text('service','',array('id'=>'service-edit','class'=>'form-control','rows'=>4))}}
	{{ Form::label('price','Сумма',array('class'=>'control-label')) }}
	{{ Form::text('price','0',array('id'=>'price-edit','class'=>'form-control','rows'=>4))}}
</div>
<div class="form-group">
	{{ Form::submit('Создать',array('class'=>'btn btn-default')) }}
</div>
{{ Form::close() }}
@stop